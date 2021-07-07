<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class Jenis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_m');
	}
	public function index()
	{
		$data['row'] = $this->jenis_m->get();
		$this->template->load('template','jenis/jenis_data',$data);
	}

	public function add()
	{
		$jenis = new stdClass();
		$jenis->jenis_id = null;
		$jenis->kebutuhan = null;

		$data = array(
				'page'=>'add',
				'row' =>$jenis,
				);

		$this->template->load('template','jenis/jenis_add',$data);
	}

	public function edit($id)
	{
		$query = $this->jenis_m->get($id);
		if($query->num_rows() >0 ) {
			$jenis = $query->row();
		
			$data = array(
				'page'=>'edit',
				'row' =>$jenis,
				);

		$this->template->load('template','jenis/jenis_add',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('jenis')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->jenis_m->add($post);
			$this->session->set_flashdata('message','Data Berhasil Disimpan');
			redirect ('jenis');
		} else if(isset($_POST['edit'])){
			$this->jenis_m->edit($post);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect ('jenis');
		}
	}

	public function del($id) {
		$this->jenis_m->del($id);
		$this->session->set_flashdata('message','Delete Data Berhasil');
		redirect('jenis');
	}							
}