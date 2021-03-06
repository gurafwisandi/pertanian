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
      }elseif($this->input->post('jenis_laporan') == 'Seminar Pengajuan'){
        $data['title'] = 'Laporan Seminar';
        $data['row'] = $this->laporan_m->lap_seminar();
        $this->template->load('template','laporan/lap_seminar',$data);
      }elseif($this->input->post('jenis_laporan') == 'Jenis Kebutuhan Petani'){
        $data['title'] = 'Laporan Jenis Kebutuhan Petani';
        $data['row'] = $this->laporan_m->lap_kebutuhan();
        $this->template->load('template','laporan/lap_kebutuhan',$data);
      }elseif($this->input->post('jenis_laporan') == 'Koperasi'){
        $data['title'] = 'Laporan Jumlah Pengajuan Koperasi';
        $data['row'] = $this->laporan_m->lap_koperasi();
        $this->template->load('template','laporan/lap_koperasi',$data);
      }elseif($this->input->post('jenis_laporan') == 'Panen Berhasil'){
        $data['title'] = 'Laporan Panen Berhasil';
        $data['row'] = $this->laporan_m->lap_berhasil();
        $this->template->load('template','laporan/lap_tanam',$data);
      }elseif($this->input->post('jenis_laporan') == 'Panen Gagal'){
        $data['title'] = 'Laporan Gagal Panen';
        $data['row'] = $this->laporan_m->lap_gagal();
        $this->template->load('template','laporan/lap_tanam',$data);
      }elseif($this->input->post('jenis_laporan') == 'Akun'){
        $data['title'] = 'Laporan Akun instansi';
        $data['row'] = $this->laporan_m->akun_instansi();
        $this->template->load('template','laporan/lap_akun',$data);
      }elseif($this->input->post('jenis_laporan') == 'Petani'){
        $data['title'] = 'Laporan Petani';
        $data['row'] = $this->laporan_m->lap_petani();
        $this->template->load('template','laporan/lap_petani',$data);
      }
    }
  }
  public function print_kebutuhan()
  {
    $data['row'] = $this->laporan_m->lap_kebutuhan();
    $this->load->view('laporan/print_kebutuhan',$data);
  }
  public function print_pengajuan()
  {
    $data['row'] = $this->laporan_m->lap_pengajuan();
    $this->load->view('laporan/print_pengajuan',$data);
  }
  public function print_penyerahan()
  {
    $data['row'] = $this->laporan_m->lap_penyerahan();
    $this->load->view('laporan/print_penyerahan',$data);
  }
  public function print_seminar()
  {
    $data['row'] = $this->laporan_m->lap_seminar();
    $this->load->view('laporan/print_seminar',$data);
  }
  public function print_panen_berhasil()
  {
    $data['row'] = $this->laporan_m->lap_berhasil();
    $this->load->view('laporan/print_panen_berhasil',$data);
  }
  public function print_panen_gagal()
  {
    $data['row'] = $this->laporan_m->lap_gagal();
    $this->load->view('laporan/print_panen_gagal',$data);
  }
  public function print_koperasi()
  {
    $data['row'] = $this->laporan_m->lap_koperasi();
    $this->load->view('laporan/print_koperasi',$data);
  }
  public function print_akun()
  {
    $data['row'] = $this->laporan_m->akun_instansi();
    $this->load->view('laporan/print_akun',$data);
  }
  public function print_petani()
  {
    $data['row'] = $this->laporan_m->lap_petani();
    $this->load->view('laporan/print_petani',$data);
  }
}
