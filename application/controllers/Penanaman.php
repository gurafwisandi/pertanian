<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Penanaman extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('penanaman_m');
	}

	public function index()
	{
		$data['title'] = 'Penanaman';
		$data['link'] = 'Master / Penanaman';
		$data['row'] = $this->penanaman_m->get();
		$this->template->load('template','penanaman/penanaman_data',$data);
	}

	public function add()
	{
		$penanaman = new stdClass();
		$penanaman->penanaman_id = null;
		$penanaman->jenis = null;
		$penanaman->deskripsi = null;
		$penanaman->user_id = null;
		$data = array(
				'page' => 'add',
				'row' => $penanaman		
		);

		$this->template->load('template','penanaman/penanaman_edit', $data);
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
								if(isset($_POST['add'])){
									$this->penanaman_m->add($post);

								} else if(isset($_POST['edit'])){
									$this->penanaman_m->edit($post);
								}

								if($this->db->affected_rows() > 0 )
								{
									$this->session->set_flashdata('success','Data Berhasil disimpan');
								}
									redirect('penanaman');
	}

	public function edit($id)
	{
		$query = $this->penanaman_m->get($id);
		if($query->num_rows() > 0)
		{
			$penanaman = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $penanaman
			);
			$this->template->load('template','penanaman/penanaman_edit', $data);
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo var_dump($post);
			//echo "window.location='".site_url('penanaman')."';</script>";
		}
	}

	public function del($id)
							{
								$this->penanaman_m->del($id);
								if($this->db->affected_rows()>0)
								{
									$this->session->set_flashdata('success','Data Berhasil dihapus');
								}
									redirect('penanaman');
								
							}	
}