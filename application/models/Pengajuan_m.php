<?php defined ('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{
	public function list($id = null)
	{
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
		$this->db->join('jenis', 'jenis.jenis_id=pengajuan.jenis_id','left');
		if($this->session->userdata("level") == '2'){
			$this->db->where('pengajuan.koperasi_id', $this->session->userdata("koperasi_id"));
		}
		$query = $this->db->get();
		return $query;
	}
	public function get($id = null)
	{
		$this->db->from('pengajuan');
		$this->db->join('koperasi', 'koperasi.koperasi_id=pengajuan.koperasi_id');
		$this->db->where('pengajuan_id', $id);
		$query = $this->db->get();
		return $query;
	}
	public function get_petani($id = null)
	{
		$this->db->from('petani_pengajuan');
		$this->db->join('pengajuan', 'pengajuan.pengajuan_id=petani_pengajuan.pengajuan_id');
		$this->db->join('petani', 'petani.petani_id=petani_pengajuan.petani_id');
		$this->db->join('penanaman', 'penanaman.penanaman_id=petani.penanaman_id');
		$this->db->where('pengajuan.pengajuan_id', $id);
		$query = $this->db->get();
		return $query;
	}
	public function get_item($id = null)
	{
		$this->db->select('item_pengajuan.*, item.nama_item, nama_vendor, item.keterangan as spek_item');
		$this->db->from('item_pengajuan');
		$this->db->join('pengajuan', 'pengajuan.pengajuan_id=item_pengajuan.pengajuan_id');
		$this->db->join('item', 'item.id_item=item_pengajuan.id_item','left');
		$this->db->join('vendor', 'vendor.id_vendor=item.id_vendor','left');
		$this->db->where('pengajuan.pengajuan_id', $id);
		$query = $this->db->get();
		return $query;
	}
	public function get_no_pengajuan(){
    // NOTE : buat id_obat primary
    $this->db->select_max('pengajuan_id');
    $query = $this->db->get('pengajuan');
    $val=$query->result();
    $datadb = substr($val[0]->pengajuan_id,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->pengajuan_id,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$pengajuan_id = $tgl. sprintf("%04s",$q3);

		$this->db->set('pengajuan_id', $pengajuan_id);
		$this->db->set('koperasi_id', $this->session->userdata("koperasi_id"));
		$this->db->set('user_id', $this->session->userdata("user_id"));
		$this->db->set('status_proposal', 'Proses Pengajuan');
		$this->db->set('tgl_proposal', date('Y-m-d'));
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->insert('pengajuan');
		return $pengajuan_id;
	}

	public function add($post)
	{
		$params = [
			'koperasi_id' => $post['koperasi_id'],
			'ketua_koperasi' => $post['ketua_koperasi'],
			'user_id' => $post['user_id'],
			'tanggal_tanam' => $post['tanggal_tanam'],
			'estimasi_panen' => $post['estimasi_panen'],
			'total_lahan' => $post['total_lahan'],
			'jenis_id' => $post['jenis_id'],
			'qty' => $post['qty'],
			'ajuan_anggota' => $post['ajuan_anggota'],
			'tanaman' => $post['tanaman'],
			'status' => $post['status'],
			'created' => date('Y-m-d H:i:s')
					
		];
		$this->db->insert('pengajuan', $params);
	}
	public function update_pengajuan()
	{
		$this->db->set('jenis_id', $this->input->post('jenis_id'));
		$this->db->set('perihal_proposal', $this->input->post('perihal_proposal'));
		$this->db->set('status_proposal', $this->input->post('status_proposal'));
		$this->db->set('updated', date('Y-m-d H:i:s'));
		$this->db->where('pengajuan_id', $this->input->post('pengajuan_id'));
		$this->db->update('pengajuan');
	}
	public function add_petani($pengajuan_id)
	{
		$this->db->set('petani_id', $this->input->post('petani_id'));
		$this->db->set('pengajuan_id', $pengajuan_id);
		$this->db->insert('petani_pengajuan');
	}
	public function add_item($pengajuan_id)
	{
		$this->db->set('item', $this->input->post('item'));
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->set('pengajuan_id', $pengajuan_id);
		$this->db->insert('item_pengajuan');
	}
	public function delete($petani_id){
		$this->db->where('petani_id', $petani_id);
		$this->db->delete('petani_pengajuan');
	}
	public function delete_item($id){
		$this->db->where('id', $id);
		$this->db->delete('item_pengajuan');
	}
	public function update_doc($pengajuan_id,$nm_file)
	{
		$this->db->set('dokumen_proposal', $nm_file);
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan');
	}
	public function update_bb($pengajuan_id,$nm_file)
	{
		$this->db->set('dokumen_biaya_admin', $nm_file);
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan');
	}
	public function update_bbb($pengajuan_id,$nm_file)
	{
		$this->db->set('dokumen_biaya_bupati', $nm_file);
		$this->db->where('pengajuan_id', $pengajuan_id);
		$this->db->update('pengajuan');
	}
	public function update_dst($pengajuan_id,$nm_file)
	{
		$this->db->set('filename', $nm_file);
		$this->db->set('pengajuan_id', $pengajuan_id);
		$this->db->insert('doc_serah_terima');

		// jml_doc
		$this->db->select('count(pengajuan_id) as jml');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$query = $this->db->get('doc_serah_terima');
		$val=$query->result();
		if($val[0]->jml > 0){
			$this->db->set('jml_doc', $val[0]->jml);
			$this->db->where('pengajuan_id', $pengajuan_id);
			$this->db->update('pengajuan');
		}
	}
	public function update($id)
	{
		$this->db->select('*')
							->join('pengajuan','pengajuan.pengajuan_id=item_pengajuan.pengajuan_id')
              ->where('id',$id);
		return $this->db->get('item_pengajuan');
	}
}