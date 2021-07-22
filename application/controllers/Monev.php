<?php defined ('BASEPATH') OR exit ('No script direct access allowed');

class Monev extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('monev_m');
		$this->load->model('pengajuan_m');
		$this->load->model('jenis_m');
	}
	public function index()
	{
		$data['title'] = 'Pengajuan';
		$data['link'] = 'Master / Pengajuan';
		
		$data['row'] = $this->monev_m->list();
		$this->template->load('template','monev/monev_data', $data);
	}				
	public function input_monev($id_pengajuan)
	{
		if($this->input->post('submit') == "submit"){
			$pengajuan = $this->monev_m->input_tanam($id_pengajuan);
			$this->session->set_flashdata('message','Simpan Data Berhasil');
			redirect('/monev/input_monev/'.$id_pengajuan);
		}
		$pengajuan = $this->pengajuan_m->get($id_pengajuan)->result();
		$petani = $this->pengajuan_m->get_petani($id_pengajuan)->result();
		$item = $this->pengajuan_m->get_item($id_pengajuan)->result();
		$query_jenis = $this->jenis_m->get();
		$jenis[null] = '- Pilih -';
		foreach ($query_jenis->result() as $jns) {
		$jenis[$jns->jenis_id] = $jns->kebutuhan;
		}
		$tanam = $this->monev_m->tanam($id_pengajuan)->result();
		$data = array (
			'page' => 'add',
			'row' => $pengajuan,
			'petani' => $petani,
			'item' => $item,
			'tanam' => $tanam,
			'jenis' => $jenis,'selectedjenis' =>null,
		);
		$this->template->load('template', 'monev/input_monev',$data);
	}
	public function del($id_pengajuan, $id)
	{
		$this->monev_m->delete($id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
		redirect('/monev/input_monev/'.$id_pengajuan);
	}
	public function push_tanam($id)
	{
		$this->db->set('status_tanam', 'Proses Panen');
		$this->db->set('push_tanam', '1');
		$this->db->where('pengajuan_id', $id);
		$this->db->update('tanam'); 
		$this->session->set_flashdata('message','Push Penanaman Berhasil');
		redirect('/monev/');
	}
	public function input_panen($id_pengajuan)
	{
		if($this->input->post('submit') == "submit"){
			$pengajuan = $this->monev_m->input_panen();
			$this->session->set_flashdata('message','Simpan Data Berhasil');
			redirect('/monev/input_panen/'.$id_pengajuan);
		}
		$pengajuan = $this->pengajuan_m->get($id_pengajuan)->result();
		$petani = $this->pengajuan_m->get_petani($id_pengajuan)->result();
		$item = $this->pengajuan_m->get_item($id_pengajuan)->result();
		$query_jenis = $this->jenis_m->get();
		$jenis[null] = '- Pilih -';
		foreach ($query_jenis->result() as $jns) {
		$jenis[$jns->jenis_id] = $jns->kebutuhan;
		}
		$tanam = $this->monev_m->tanam($id_pengajuan)->result();
		$panen = $this->monev_m->panen($id_pengajuan)->result();
		$data = array (
			'page' => 'add',
			'row' => $pengajuan,
			'petani' => $petani,
			'item' => $item,
			'tanam' => $tanam,
			'panen' => $panen,
			'jenis' => $jenis,'selectedjenis' =>null,
		);
		$this->template->load('template', 'monev/input_panen',$data);
	}
	public function push_panen($id)
	{
		$this->db->set('status_tanam', 'Selesai Panen');
		$this->db->set('push_panen', '1');
		$this->db->where('pengajuan_id', $id);
		$this->db->update('tanam'); 
		$this->session->set_flashdata('message','Push Penanaman Berhasil');
		redirect('/monev/');
	}
}