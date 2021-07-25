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

	public function verifikasi($id_pengajuan)
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
		$this->template->load('template', 'pengajuan/pengajuan_verifikasi',$data);
	}

	public function verifikasi_bupati($id_pengajuan)
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
		$this->template->load('template', 'pengajuan/pengajuan_verifikasi_bupati',$data);
	}
	
	public function seminar($id_pengajuan)
	{
		if($this->input->post('seminar') == "seminar"){
			$this->db->set('tgl_seminar_kirim_bantuan', $this->input->post('tgl_seminar_kirim_bantuan'));
			$this->db->set('ket_seminar_kirim_bantuan', $this->input->post('ket_seminar_kirim_bantuan'));
			$this->db->where('pengajuan_id', $this->input->post('pengajuan_id'));
			$this->db->update('pengajuan'); 
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('/pengajuan/');
		}
		if($this->input->post('submit') == "item_bantuan"){
			$this->db->set('id_item', $this->input->post('id_item'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('item_pengajuan'); 
			redirect('/pengajuan/seminar/'.$this->input->post('pengajuan_id'));
		}
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
		$this->template->load('template', 'pengajuan/seminar',$data);
	}
	
	public function serah_terima($id_pengajuan)
	{
		if($this->input->post('serah_terima') == "serah_terima"){
			$this->do_uplaod_serah_terima($id_pengajuan);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('/pengajuan/serah_terima/'.$id_pengajuan);
		}
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
		$this->template->load('template', 'pengajuan/serah_terima',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->pengajuan_m->update($id)->result();
		$this->load->view('pengajuan/get_conten',$data);
	}

	public function proses($pengajuan_id)
	{
		if($this->input->post('submit') == "submit"){
			$this->pengajuan_m->update_pengajuan();
			$this->do_uplaod($pengajuan_id);
			$this->session->set_flashdata('message','Update Data Berhasil');
			if($this->input->post('status_proposal') == "Proses Pengajuan"){
				redirect('/pengajuan/add/'.$pengajuan_id);
			}else{
				redirect('/pengajuan/');
			}
		}elseif($this->input->post('verifikasi') == "verifikasi"){
			$pengajuan_id = $this->input->post('pengajuan_id');
			$this->db->set('status_proposal', $this->input->post('status_proposal'));
			if($this->input->post('status_proposal') == 'Kembalikan Pengajuan'){
				$this->db->set('keterangan', $this->input->post('keterangan'));
				$this->db->set('ket_kembali_admin', $this->input->post('keterangan'));
				$this->db->set('id_user_verifikasi', null);
				$this->db->set('tgl_verifikasi', null);
			}else{
				$this->db->set('id_user_verifikasi', $this->session->userdata("user_id"));
				$this->db->set('tgl_verifikasi', date('Y-m-d H:i:s'));
				$this->db->set('keterangan', null);
			}
			$this->db->where('pengajuan_id', $pengajuan_id);
			$this->db->update('pengajuan'); 
			$this->do_uplaod_biaya($pengajuan_id);
			if($this->input->post('status_proposal') == "Kembalikan Pengajuan"){
				$this->session->set_flashdata('message','Pengajuan Dikembalikan');
			}else{
				$this->session->set_flashdata('message','Approve Administrasi');
			}
			redirect('/pengajuan/');
		}elseif($this->input->post('verifikasi_bupati') == 'verifikasi_bupati'){
			$pengajuan_id = $this->input->post('pengajuan_id');
			$this->db->set('status_proposal', $this->input->post('status_proposal'));
			if($this->input->post('status_proposal') == 'Kembalikan Administrasi'){
				$this->db->set('keterangan_bupati', $this->input->post('keterangan_bupati'));
				$this->db->set('id_user_verifikasi_dinas', $this->session->userdata("user_id"));
				$this->db->set('tgl_verifikasi_dinas', date('Y-m-d H:i:s'));
				$this->db->set('dokumen_biaya_bupati', null);
				$this->db->set('dokumen_biaya_admin', null);
				$this->db->set('id_user_verifikasi', null);
				$this->db->set('tgl_verifikasi', null);
				$this->db->set('push_admin', null);
				$this->db->where('pengajuan_id', $pengajuan_id);
				$this->db->update('pengajuan'); 
			}else{
				$this->db->set('id_user_verifikasi_dinas', $this->session->userdata("user_id"));
				$this->db->set('tgl_verifikasi_dinas', date('Y-m-d H:i:s'));
				$this->db->set('keterangan_bupati', null);
				$this->db->where('pengajuan_id', $pengajuan_id);
				$this->db->update('pengajuan'); 
				$this->do_uplaod_biaya_bupati($pengajuan_id);
			}
			if($this->input->post('status_proposal') == "Kembalikan Administrasi"){
				$this->session->set_flashdata('message','Pengajuan Dikembalikan');
			}else{
				$this->session->set_flashdata('message','Approve Bupati');
			}
			redirect('/pengajuan/');
		}
	}

	public function do_uplaod_biaya_bupati($pengajuan_id)
	{
		// upload gambar
		$config['upload_path'] = './assets/uploads';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf|jpeg|';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$new_name = date('ymdhis').'_bbb_'.$pengajuan_id;
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
			$this->pengajuan_m->update_bbb($pengajuan_id,$nm_file);
		}
	}

	public function do_uplaod_serah_terima($pengajuan_id)
	{
		// upload gambar
		$config['upload_path'] = './assets/uploads_serah_terima';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf|jpeg|';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$new_name = date('ymdhis').'_dst_'.$pengajuan_id;
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
			$this->pengajuan_m->update_dst($pengajuan_id,$nm_file);
		}
	}

	public function do_uplaod_biaya($pengajuan_id)
	{
		// upload gambar
		$config['upload_path'] = './assets/uploads';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf|jpeg|';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$new_name = date('ymdhis').'_bb_'.$pengajuan_id;
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
			$this->pengajuan_m->update_bb($pengajuan_id,$nm_file);
		}
	}

	public function push($pengajuan_id)
	{
		$this->db->set('status_proposal', 'Proses Verifikasi');
		$this->db->set('push_pengajuan', '1');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan'); 
		$this->session->set_flashdata('message','Push Pengajuan Berhasil');
		redirect('/pengajuan/');
	}

	public function push_admin($pengajuan_id)
	{
		$this->db->set('ket_kembali_admin', null);
		$this->db->set('status_proposal', 'Proses Verifikasi Bupati');
		$this->db->set('push_admin', '1');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan'); 
		$this->session->set_flashdata('message','Push Pengajuan Berhasil');
		redirect('/pengajuan/');
	}

	public function push_bupati($pengajuan_id)
	{
		$this->db->set('status_proposal', 'Proses Penyaluran');
		$this->db->set('push_bupati', '1');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan'); 
		$this->session->set_flashdata('message','Push Pengajuan Berhasil');
		redirect('/pengajuan/');
	}

	public function push_seminar($pengajuan_id)
	{
		$this->db->set('status_proposal', 'Proses Serah Terima');
		$this->db->set('push_seminar_kirim_bantuan', '1');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan'); 
		$this->session->set_flashdata('message','Push Pengajuan Berhasil');
		redirect('/pengajuan/');
	}

	public function push_serah_terima($pengajuan_id)
	{
		$this->db->set('status_proposal', 'Done pengajuan');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan'); 
		$this->session->set_flashdata('message','Push Pengajuan Berhasil');
		redirect('/pengajuan/');
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

	public function view($id_pengajuan)
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
		$this->template->load('template', 'pengajuan/view_pengajuan',$data);
	}
}