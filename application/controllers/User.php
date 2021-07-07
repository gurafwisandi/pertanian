<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template','user/user_data',$data);
	}

	public function add()
	{
		$user = new stdClass();
		$user->user_id = null;
		$user->nama = null;
		$user->jabatan = null;
		$user->nip = null;
		$user->username = null;
		$user->email = null;
		$user->password = null;

		$data = array(
				'page' => 'add',
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

		$this->template->load('template','user/user_edit',$data);
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

								} else if(isset($_POST['edit'])){
									$this->user_m->edit($post);
								}

								if($this->db->affected_rows() > 0 ) {
									echo "<script>alert('Data Berhasil disimpan');</script>";
							}
									echo "<script>window.location='".site_url('user')."';</script>";
	}

	public function del($id)
	{
		$this->user_m->del($id);
		if($this->db->affected_rows() > 0 ) {
		echo "<script>alert('Data Berhasil hapus');</script>";
		}
		echo "<script>window.location='".site_url('user')."';</script>";
	}
}