<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Koperasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model(['koperasi_m','petani_m','user_m']);
	}

	public function index()
	{
		$data['title'] = 'Instansi';
		$data['link'] = 'Master / Instansi';
		$data['row'] = $this->koperasi_m->get();
		$this->template->load('template','koperasi/list_koperasi',$data);
	}

	public function add()
	{
		$koperasi = new stdClass();
		$koperasi->koperasi_id = null;
		$koperasi->nama = null;
		$koperasi->ketua = null;
		$koperasi->alamat = null;
		$koperasi->telpon = null;

		$data = array(
				'page' => 'add',
				'row' => $koperasi,
				
		);

		$this->template->load('template','koperasi/koperasi_edit', $data);
	}

	public function edit($id)
	{
		$query = $this->koperasi_m->get($id);
		if($query->num_rows() >0 ) {
			$koperasi = $query->row();
		
			$data = array(
				'page'=>'edit',
				'row' =>$koperasi,
				);
		
		$this->template->load('template','koperasi/koperasi_edit',$data);
	} else {
		echo "<script>alert('Data Tidak Ditemukan');";
		echo "window.location='".site_url('koperasi')."';</script>";
	}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['edit'])){
			$this->koperasi_m->edit($post);
			$this->do_uplaod($post['id']);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('/koperasi');
		}
	}

	public function del($id)
	{
		$this->koperasi_m->del($id);
		if($this->db->affected_rows() > 0 ) {
		echo "<script>alert('Data Berhasil hapus');</script>";
		}
		echo "<script>window.location='".site_url('koperasi')."';</script>";
	}	
	
	public function do_uplaod($id_koperasi)
	{
		// upload gambar
		$config['upload_path'] = './assets/user';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf|jpeg|';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$new_name = date('ymdhis').'_'.$id_koperasi;
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
			$this->user_m->update_user($id_koperasi,$nm_file);
		}
	}		
}