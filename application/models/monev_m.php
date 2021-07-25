<?php defined ('BASEPATH') OR exit('No direct script access allowed');

class Monev_m extends CI_Model
{
	public function list($id = null)
	{
		$this->db->select('pengajuan.pengajuan_id, koperasi.koperasi, tanam.tgl_tanam, tanam.tgl_perkiraan_panen,
		tanam.status_tanam, tanam.flag_panen, tanam.push_tanam');
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
		$this->db->join('jenis', 'jenis.jenis_id=pengajuan.jenis_id','left');
		$this->db->join('tanam', 'tanam.pengajuan_id=pengajuan.pengajuan_id','left');
    $this->db->where('status_proposal','Done Pengajuan');
		$query = $this->db->get();
		return $query;
	}
	public function tanam($pengajuan_id = null)
	{
		$this->db->from('tanam');
    $this->db->where('pengajuan_id',$pengajuan_id);
		$query = $this->db->get();
		return $query;
	}
	public function panen($pengajuan_id = null)
	{
		$this->db->from('tanam');
		$this->db->join('hasil_panen', 'hasil_panen.id_panen=tanam.id');
    $this->db->where('pengajuan_id',$pengajuan_id);
		$query = $this->db->get();
		return $query;
	}
	public function input_tanam($pengajuan_id)
	{
		$this->db->set('alamat_kebun', $this->input->post('alamat_kebun'));
		$this->db->set('total_tanam', $this->input->post('total_tanam'));
		$this->db->set('tgl_tanam', $this->input->post('tgl_tanam'));
		$this->db->set('tgl_perkiraan_panen', $this->input->post('tgl_perkiraan_panen'));
		$this->db->set('pengajuan_id', $pengajuan_id);
		$this->db->insert('tanam');
	}
	public function input_panen()
	{
		$this->db->set('id_panen', $this->input->post('id_panen'));
		$this->db->set('tgl_panen', $this->input->post('tgl_panen'));
		$this->db->set('jumlah_panen', $this->input->post('jumlah_panen'));
		$this->db->set('jenis_panen', $this->input->post('jenis_panen'));
		$this->db->insert('hasil_panen');

		$pengajuan_id=$this->input->post('pengajuan_id');
		$data = array('flag_panen' => '1');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('tanam', $data);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tanam');
	}
}