<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('user_m');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get_koperasi();
		$this->template->load('template','user/user_data',$data);
	}

	public function add()
	{
		$user = new stdClass();
		$user->user_id = null;
		$user->koperasi_id = null;
		$user->foto = null;
		$user->koperasi = null;
		$user->ketua = null;
		$user->level = null;
		$user->jabatan = null;
		$user->nip = null;
		$user->username = null;
		$user->alamat = null;
		$user->telpon = null;
		$user->email = null;
		$user->password = null;

		$data = array(
				'page' => 'dinas',
				'row' => $user,				
		);

		$this->template->load('template','user/user_edit', $data);
	}

	public function edit($id)
	{
		$query = $this->user_m->get($id);
		if($query->num_rows() >0 ) {
			$user = $query->row();
		
			$data = array(
				'page'=>'edit',
				'row' =>$user,
				);
			$this->template->load('template','user/user_edit_kop',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('user')."';</script>";
		}
	}

	public function approve($id)
	{
		$query = $this->user_m->get($id);
		if($query->num_rows() >0 ) {
			$user = $query->row();
		
			$data = array(
				'page'=>'approve',
				'row' =>$user,
				);
			$this->template->load('template','user/user_edit_kop',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('user')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->user_m->add($post);
		} else if(isset($_POST['dinas'])){
			$id_koperasi=$this->user_m->add_dinas($post);
			$this->do_uplaod($id_koperasi);
			$this->user_m->approve($post);
			$this->session->set_flashdata('message','Simpan Data Berhasil');
			redirect('/user/dinas');
		} else if(isset($_POST['approve_dinas'])){
			$this->user_m->approve_dinas($post);
			$this->session->set_flashdata('message','Approve Data Berhasil');
			redirect('/user/dinas');
		} else if(isset($_POST['edit'])){
			$this->user_m->edit($post);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('/user');
		} else if(isset($_POST['approve'])){
			$this->user_m->approve($post);
			$this->session->set_flashdata('message','Approve Data Berhasil');
			redirect('/user');
		} else if(isset($_POST['edit_dinas'])){
			$this->user_m->edit_dinas($post);
			$this->do_uplaod($post['koperasi_id']);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('/user/dinas');
		}
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

	public function del($id)
	{
		$this->user_m->del($id);
		$this->session->set_flashdata('message','Delete Data Berhasil');
		redirect('/user');
	}

	public function dinas()
	{
		$data['row'] = $this->user_m->get_dinas();
		$this->template->load('template','user/dinas_data',$data);
	}
	public function edit_dinas($id)
	{
		$query = $this->user_m->get($id);
		if($query->num_rows() >0 ) {
			$user = $query->row();
		
			$data = array(
				'page'=>'edit_dinas',
				'row' =>$user,
				);
			$this->template->load('template','user/user_edit',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('user')."';</script>";
		}
	}
	public function approve_dinas($id)
	{
		$query = $this->user_m->get($id);
		if($query->num_rows() >0 ) {
			$user = $query->row();
		
			$data = array(
				'page'=>'approve_dinas',
				'row' =>$user,
				);
			$this->template->load('template','user/user_edit',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('user')."';</script>";
		}
	}
}