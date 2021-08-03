<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Dashboard_m extends CI_Model
{

	public function JumlahPengajuan()
	{   
		$this->db->select('*');
		$this->db->from('pengajuan');
		if($this->session->userdata("level") == '2'){
			$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
			$this->db->where('pengajuan.koperasi_id', $this->session->userdata("koperasi_id"));
		}
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function JumlahPetani()
	{  
		$this->db->select('*');
		$this->db->from('petani');
		if($this->session->userdata("level") == '2'){
			// $this->db->join('petani_pengajuan', 'petani_pengajuan.petani_id=petani.petani_id');
			// $this->db->join('pengajuan', 'pengajuan.pengajuan_id=petani_pengajuan.pengajuan_id');
			// $this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
			$this->db->where('petani.koperasi_id', $this->session->userdata("koperasi_id"));
		} 
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function JumlahKoperasi()
	{   
		$this->db->select('*');
		$this->db->from('koperasi');
		if($this->session->userdata("level") == '2'){
			$this->db->where('koperasi.koperasi_id', $this->session->userdata("koperasi_id"));
		}
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function JumlahMonev()
	{   
		$this->db->select('*');
		$this->db->from('tanam');
		if($this->session->userdata("level") == '2'){
			$this->db->join('pengajuan', 'pengajuan.pengajuan_id=tanam.pengajuan_id');
			$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
			$this->db->where('pengajuan.koperasi_id', $this->session->userdata("koperasi_id"));
		}
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}