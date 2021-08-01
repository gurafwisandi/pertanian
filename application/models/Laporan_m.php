<?php defined ('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
	public function lap_pengajuan()
	{
		$this->db->select("pengajuan.pengajuan_id,tgl_proposal,koperasi,ketua,
    GROUP_CONCAT(item_pengajuan.item ORDER BY nama_item DESC SEPARATOR ',') as item_kebutuhan,
    GROUP_CONCAT(nama_item ORDER BY nama_item DESC SEPARATOR ',') as item_pengajuan,
    GROUP_CONCAT(qty ORDER BY nama_item DESC SEPARATOR ',') as item_qty, kebutuhan,
    COUNT(petani_id) as jml_anggota, status_proposal, dokumen_biaya_bupati");
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
		$this->db->join('item_pengajuan', 'item_pengajuan.pengajuan_id=pengajuan.pengajuan_id','left');
		$this->db->join('item', 'item.id_item=item_pengajuan.id_item','left');
		$this->db->join('jenis', 'jenis.jenis_id=pengajuan.jenis_id','left');
		$this->db->join('petani_pengajuan', 'petani_pengajuan.pengajuan_id=pengajuan.pengajuan_id','left');
		if($this->session->userdata("level") == '2'){
			$this->db->where('pengajuan.koperasi_id', $this->session->userdata("koperasi_id"));
		}
    $this->db->group_by('pengajuan.pengajuan_id');
		$query = $this->db->get();
		return $query;
	}
	public function lap_koperasi()
	{
		$this->db->select("koperasi,alamat,COUNT(pengajuan_id) as jml_pengajuan");
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
    $this->db->where('status_proposal','Done Pengajuan');
    $this->db->group_by('koperasi.koperasi_id');
		$query = $this->db->get();
		return $query;
	}
	public function lap_kebutuhan()
	{
		$this->db->select("nama_item");
		$this->db->from('pengajuan');
		$this->db->join('item_pengajuan', 'item_pengajuan.pengajuan_id=pengajuan.pengajuan_id');
		$this->db->join('item', 'item.id_item=item_pengajuan.id_item');
    $this->db->where('status_proposal','Done Pengajuan');
    $this->db->group_by('item.id_item');
		$query = $this->db->get();
		return $query;
	}
	public function lap_penyerahan()
	{
		$this->db->select("pengajuan.pengajuan_id,tgl_proposal,koperasi,ketua,
    GROUP_CONCAT(item_pengajuan.item ORDER BY nama_item DESC SEPARATOR ',') as item_kebutuhan,
    GROUP_CONCAT(nama_item ORDER BY nama_item DESC SEPARATOR ',') as item_pengajuan,
    GROUP_CONCAT(qty ORDER BY nama_item DESC SEPARATOR ',') as item_qty, kebutuhan,
    COUNT(petani_id) as jml_anggota, status_proposal, dokumen_biaya_bupati");
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
		$this->db->join('item_pengajuan', 'item_pengajuan.pengajuan_id=pengajuan.pengajuan_id','left');
		$this->db->join('item', 'item.id_item=item_pengajuan.id_item','left');
		$this->db->join('jenis', 'jenis.jenis_id=pengajuan.jenis_id','left');
		$this->db->join('petani_pengajuan', 'petani_pengajuan.pengajuan_id=pengajuan.pengajuan_id','left');
		if($this->session->userdata("level") == '2'){
			$this->db->where('pengajuan.koperasi_id', $this->session->userdata("koperasi_id"));
		}
    $this->db->group_by('pengajuan.pengajuan_id');
		$query = $this->db->get();
		return $query;
	}
}