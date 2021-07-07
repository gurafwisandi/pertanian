<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class Petani extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model(['petani_m','koperasi_m','penanaman_m']);
	}

	public function index()
	{
		$data['title'] = 'Petani';
		$data['link'] = 'Master / petani';
		$data['row'] = $this->petani_m->get();
		$this->template->load('template','petani/petani_data',$data);
	}

	public function add()
	{
		$petani = new stdClass();
		$petani->petani_id = null;
		$petani->nama = null;
		$petani->alamat = null;
		$petani->nik = null;
		$petani->no_hp = null;
		
		$query_koperasi = $this->koperasi_m->get($this->session->userdata("koperasi_id"));
		$koperasi[null] = '- Pilih -';
		foreach ($query_koperasi->result() as $kpr) {
			$koperasi[$kpr->koperasi_id] = $kpr->koperasi;
		}

		$query_penanaman = $this->penanaman_m->get();
		$penanaman[null] = '- Pilih -';
		foreach ($query_penanaman->result() as $pnm) {
			$penanaman[$pnm->penanaman_id] = $pnm->jenis;
		}


		$data = array(
				'page' => 'add',
				'row' => $petani,
				'koperasi' =>$koperasi, 'selectedkoperasi' =>null,
				'penanaman' =>$penanaman, 'selectedpenanaman' =>null,
		);

		$this->template->load('template','petani/petani_edit', $data);
	}

	public function edit($id)
	{
		$query = $this->petani_m->get($id);
		if($query->num_rows() > 0)
		{
			$petani = $query->row();
			
			$query_koperasi = $this->koperasi_m->get($this->session->userdata("koperasi_id"));
			$koperasi[null] = '- Pilih -';
			foreach ($query_koperasi->result() as $kpr) {
			$koperasi[$kpr->koperasi_id] = $kpr->koperasi;
			}

			$query_penanaman = $this->penanaman_m->get();
			$penanaman[null] = '- Pilih -';
			foreach ($query_penanaman->result() as $pnm) {
				$penanaman[$pnm->penanaman_id] = $pnm->jenis;
		}

		$data = array(
				'page' => 'edit',
				'row' => $petani,
				'koperasi' => $koperasi, 'selectedkoperasi' => $petani->koperasi_id,
				'penanaman' => $penanaman, 'selectedpenanaman' =>$petani->penanaman_id,
				
		);
		$this->template->load('template','petani/petani_edit',$data);
			
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('petani')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->petani_m->add($post);
			$this->session->set_flashdata('message','Data Berhasil Disimpan');
			redirect('petani');
		} else if (isset($_POST['edit'])) {
			$this->petani_m->edit($post);
			$this->session->set_flashdata('message','Update Data Berhasil');
			redirect('petani');
		} 
	}

	public function del($id) {
		$this->petani_m->del($id);
		$this->session->set_flashdata('message','Delete Data Berhasil');
		redirect('/petani');
		// if($this->db->affected_rows() > 0 ) {
		// echo "<script>alert('Data Berhasil hapus');</script>";
		// }
		// echo "<script>window.location='".site_url('petani')."';</script>";
	}	
}