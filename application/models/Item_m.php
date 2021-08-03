<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Item_m extends CI_Model
{
	public function get($id =null)
	{
		$this->db->from('item');
		if($id != null)
		{
			$this->db->where('id_item',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	// public function add($post)
	// {
	// 	$params = [
	// 		'kebutuhan' => $post['kebutuhan'],
	// 		'created' => date('Y-m-d H:i:s')
	// 	];

	// 	$this->db->insert('item',$params);
	// }

	// public function edit($post)
	// {
	// 	$params = [
	// 				'kebutuhan' => $post['kebutuhan'],
	// 				'updated' => date('Y-m-d H:i:s')
	// 				];

	// 		$this->db->where('id_item', $post['id']);
	// 		$this->db->update('item', $params);
	// }

	// public function del($id)
	// {
	// 	$this->db->where('id_item', $id);
	// 	$this->db->delete('item');
	// }
}