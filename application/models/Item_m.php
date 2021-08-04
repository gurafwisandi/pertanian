<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Item_m extends CI_Model
{
	public function get($id =null)
	{
		$this->db->from('item');
		$this->db->join('vendor','vendor.id_vendor = item.id_vendor');
		if($id != null)
		{
			$this->db->where('id_item',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nama_item' => $post['nama_item'],
			'keterangan' => $post['keterangan'],
			'harga' => $post['harga'],
			'id_vendor' => $post['id_vendor'],
			'created' => date('Y-m-d H:i:s')
		];

		$this->db->insert('item',$params);
	}

	public function edit($post)
	{
		$params = [
					'nama_item' => $post['nama_item'],
					'keterangan' => $post['keterangan'],
					'harga' => $post['harga'],
					'id_vendor' => $post['id_vendor'],
					'updated' => date('Y-m-d H:i:s')
		];

		$this->db->where('id_item', $post['id']);
		$this->db->update('item', $params);
	}

	public function del($id)
	{
		$this->db->where('id_item', $id);
		$this->db->delete('item');
	}
}