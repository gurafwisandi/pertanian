<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Vendor_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('vendor');
		if($id != null)
		{
			$this->db->where('id_vendor',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nama_vendor' => $post['nama_vendor'],
		];

		$this->db->insert('vendor',$params);
	}

	public function edit($post)
	{
	$params = [
			'nama_vendor' => $post['nama_vendor'],
		];

		$this->db->where('id_vendor',$post['id']);
		$this->db->update('vendor', $params);
	}

	public function del($id)
	{
		$this->db->where('id_vendor', $post['id']);
		$this->db->delete('vendor');
	}
}