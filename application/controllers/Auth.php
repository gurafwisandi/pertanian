<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
			{
				
				$query = $this->user_m->login($post);

				if($query->num_rows() >0)
				{
					$row =$query->row();
					$params = array(
						'userid' => $row->user_id,
						'koperasi_id' => $row->koperasi_id,
						'level' => $row->level
					);

					$this->session->set_userdata($params);
					echo "<script>alert('Login Berhasil'); window.location='".site_url('/dashboard')."'</script>";
				}else{

					echo "<script>alert('Login Gagal'); window.location='".site_url('auth/login')."'</script>";
				}
			}
	}


	public function logout()
	{
	  $this->session->sess_destroy($data_session);
		redirect('/auth/login');
	}
}