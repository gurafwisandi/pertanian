<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Koperasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['koperasi_m','petani_m']);
	}

	public function index()
	{
		$data['title'] = 'Koperasi';
		$data['link'] = 'Master / Koperasi';
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
								if(isset($_POST['add'])) {
									$this->koperasi_m->add($post);

								} else if(isset($_POST['edit'])){
									$this->koperasi_m->edit($post);
								}

								if($this->db->affected_rows() > 0 ) {
									echo "<script>alert('Data Berhasil disimpan');</script>";
							}
									echo "<script>window.location='".site_url('koperasi')."';</script>";
	}

	public function del($id)
	{
		$this->koperasi_m->del($id);
		if($this->db->affected_rows() > 0 ) {
		echo "<script>alert('Data Berhasil hapus');</script>";
		}
		echo "<script>window.location='".site_url('koperasi')."';</script>";
	}			
}