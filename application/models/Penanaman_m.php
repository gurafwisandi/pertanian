<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penanaman_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('penanaman');
		if($id != null)
		{
			$this->db->where('penanaman_id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'jenis' => $post['jenis'],
			'deskripsi' => $post['deskripsi'],
			'created' => date('Y-m-d H:i:s')
		];
		$this->db->insert('penanaman', $params);
	}

	public function edit($post)
	{
		$params = [
			'jenis' => $post['jenis'],
			'deskripsi' => $post['deskripsi'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('penanaman_id',$post['id']);
		$this->db->update('penanaman', $params);
	}

	public function del($id)
	{
		$this->db->where('penanaman_id', $id);
		$this->db->delete('penanaman');
	}
}