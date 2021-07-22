<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Vendor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vendor_m');
	}

	public function index()
	{
		$data['row'] = $this->vendor_m->get();
		$this->template->load('template','vendor/vendor_data',$data);
	}

	public function add()
	{
		$vendor = new stdClass();
		$vendor->id_vendor= null;
		$vendor->nama_vendor = null;

		$data= array(
			'page'=> 'add',
			'row'=>$vendor,
		);
		
		$this->template->load('template','vendor/vendor_form',$data);
	}

	public function edit($id)
	{
		$query = $this->vendor_m->get($id);
		if ($query->num_rows() > 0)
		{
			$vendor = $query->row();
			$data = array(
				'page'=> 'edit',
				'row' => $vendor,
			);

			$this->template->load('template','vendor/vendor_form',$data);
		} else {
			echo "<script>alert('Data Tidak di temukan);";
			echo "window.location='".site_url('vendor')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])){
			$this->vendor_m->add($post);
			$this->session->set_flashdata('message','Data Berhasil disimpan');
			//var_dump($post);
			redirect('vendor');

		} else if (isset($_POST['edit'])){
				$this->vendor_m->edit($post);
				$this->session->set_flashdata('message','Data Berhasil di Edit');
				//var_dump($post);
				redirect ('vendor');
		}
		
	}

	public function del($id)
	{
		$this->vendor_m->del($id);
		$this->session->set_flashdata('message','Delete Data Berhasil');
		redirect('vendor');
	}
}