<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('dashboard_m');
	}
	
	public function index()
	{
		$data['total_pengajuan'] = $this->dashboard_m->JumlahPengajuan();
		$data['total_koperasi'] = $this->dashboard_m->JumlahKoperasi();
		$data['total_petani'] = $this->dashboard_m->JumlahPetani();
		$data['total_monev'] = $this->dashboard_m->JumlahMonev();
		
		$this->template->load('template','dashboard/dashboard',$data);
	}

	

}
