<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Petani_m extends CI_Model
{
	public function get($id=null)

	{
		$this->db->select('petani.*, koperasi, penanaman.jenis as penanaman_jenis');
		$this->db->from('petani');
		$this->db->join('koperasi','koperasi.koperasi_id = petani.koperasi_id');
		$this->db->join('penanaman','penanaman.penanaman_id = petani.penanaman_id');
		if($id != null)
			{
								
				$this->db->where('petani_id', $id);

			}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nama' => $post['nama'],
			'nik' => $post['nik'],
			'alamat' => $post['alamat'],
			'no_hp' => $post['no_hp'],
			'koperasi_id' => $post['koperasi'],
			'penanaman_id' => $post['penanaman'],
		];
		$this->db->insert('petani', $params);
	}

	public function edit($post)
	{
		$params = [
			'nama' => $post['nama'],
			'nik' => $post['nik'],
			'alamat' => $post['alamat'],
			'no_hp' => $post['no_hp'],
			'koperasi_id' => $post['koperasi'],
			'penanaman_id' => $post['penanaman'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('petani_id', $post['id']);
		$this->db->update('petani', $params);
	}

	public function del($id)
	{
		$this->db->where('petani_id', $id);
		$this->db->delete('petani');
	}
	
}