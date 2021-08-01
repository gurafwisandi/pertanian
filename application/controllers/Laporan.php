<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_m');
	}
	
	public function index()
	{
		$this->template->load('template','laporan/laporan');
	}

  public function process()
  {
		if($this->input->post('laporan') == "laporan"){
      if($this->input->post('jenis_laporan') == 'Pengajuan'){
        $data['title'] = 'Laporan Pengajuan';
        $data['row'] = $this->laporan_m->lap_pengajuan();
        $this->template->load('template','laporan/lap_pengajuan',$data);
      }elseif($this->input->post('jenis_laporan') == 'Penyerahan'){
        $data['title'] = 'Laporan Penyerahan';
        $data['row'] = $this->laporan_m->lap_penyerahan();
        $this->template->load('template','laporan/lap_penyerahan',$data);
      }elseif($this->input->post('jenis_laporan') == 'Seminar Penagjuan'){
      }elseif($this->input->post('jenis_laporan') == 'Jenis Kebutuhan Petani'){
        $data['title'] = 'Laporan Jenis Kebutuhan Petani';
        $data['row'] = $this->laporan_m->lap_kebutuhan();
        $this->template->load('template','laporan/lap_kebutuhan',$data);
      }elseif($this->input->post('jenis_laporan') == 'Koperasi'){
        $data['title'] = 'Laporan Jumlah Pengajuan Koperasi';
        $data['row'] = $this->laporan_m->lap_koperasi();
        $this->template->load('template','laporan/lap_koperasi',$data);
      }
    }
  }
}
