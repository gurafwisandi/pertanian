<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class Item extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('item_m');
	}
	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template','item/item_data',$data);
	}

	// public function add()
	// {
	// 	$item = new stdClass();
	// 	$item->item_id = null;
	// 	$item->kebutuhan = null;

	// 	$data = array(
	// 			'page'=>'add',
	// 			'row' =>$item,
	// 			);

	// 	$this->template->load('template','item/item_add',$data);
	// }

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() >0 ) {
			$item = $query->row();
		
			$data = array(
				'page'=>'edit',
				'row' =>$item,
				);

		$this->template->load('template','item/item_add',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}

	// public function process()
	// {
	// 	$post = $this->input->post(null, TRUE);
	// 	if(isset($_POST['add'])){
	// 		$this->item_m->add($post);
	// 		$this->session->set_flashdata('message','Data Berhasil Disimpan');
	// 		redirect ('item');
	// 	} else if(isset($_POST['edit'])){
	// 		$this->item_m->edit($post);
	// 		$this->session->set_flashdata('message','Update Data Berhasil');
	// 		redirect ('item');
	// 	}
	// }

	// public function del($id) {
	// 	$this->item_m->del($id);
	// 	$this->session->set_flashdata('message','Delete Data Berhasil');
	// 	redirect('item');
	// }							
}