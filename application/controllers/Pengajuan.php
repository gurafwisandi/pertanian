<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model(['pengajuan_m','jenis_m']);
	}
	
	public function index()
	{
		$data['title'] = 'Pengajuan';
		$data['link'] = 'Master / Pengajuan';
		$this->load->model('pengajuan_m');
		
		$data['row'] = $this->pengajuan_m->list();
		$this->template->load('template','pengajuan/pengajuan_data', $data);
	}

	public function no_pengajuan()
	{
		$pengajuan = $this->pengajuan_m->get_no_pengajuan();
		redirect('/pengajuan/add/'.$pengajuan);
	}

	public function add($id_pengajuan)
	{
			$pengajuan = $this->pengajuan_m->get($id_pengajuan)->result();
			$petani = $this->pengajuan_m->get_petani($id_pengajuan)->result();
			$item = $this->pengajuan_m->get_item($id_pengajuan)->result();
			$query_jenis = $this->jenis_m->get();
			$jenis[null] = '- Pilih -';
			foreach ($query_jenis->result() as $jns) {
			$jenis[$jns->jenis_id] = $jns->kebutuhan;
			}
			$data = array (
				'page' => 'add',
				'row' => $pengajuan,
				'petani' => $petani,
				'item' => $item,
				'jenis' => $jenis,'selectedjenis' =>null,
			);
		$this->template->load('template', 'pengajuan/pengajuan_form',$data);
	}
	public function proses($pengajuan_id)
	{
		if($this->input->post('submit') == "submit"){
			$this->pengajuan_m->update_pengajuan();
			$this->do_uplaod($pengajuan_id);
			redirect('/pengajuan/add/'.$pengajuan_id);
		}
	}

	
	public function do_uplaod($pengajuan_id)
	{
		// upload gambar
		$config['upload_path'] = './assets/uploads';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf|jpeg|';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$new_name = date('ymdhis').'_'.$pengajuan_id;
		$config['file_name'] = $new_name;
		
		$this->upload->initialize($config);
		if (! $this->upload->do_upload('file'))
		{			
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());	
			$nm_file=$this->upload->data('file_name');	
			// ini ganti aja sama model lu tapi sebener nya ini proses nya update
			// jadi lu insert dlo field yg lain 
			$this->pengajuan_m->update_doc($pengajuan_id,$nm_file);
		}
	}
	public function add_petani($pengajuan_id)
	{
		$this->pengajuan_m->add_petani($pengajuan_id);
		redirect('/pengajuan/add/'.$pengajuan_id);
	}
	public function add_item($pengajuan_id)
	{
		$this->pengajuan_m->add_item($pengajuan_id);
		redirect('/pengajuan/add/'.$pengajuan_id);
	}
	public function delete($id_pengajuan,$petani_id)
	{
		$this->pengajuan_m->delete($petani_id);
		redirect('/pengajuan/add/'.$id_pengajuan);
	}
	public function delete_item($id_pengajuan,$id)
	{
		$this->pengajuan_m->delete_item($id);
		redirect('/pengajuan/add/'.$id_pengajuan);
	}
}