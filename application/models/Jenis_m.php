<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Jenis_m extends CI_Model
{
	public function get($id =null)
	{
		$this->db->from('jenis');
		if($id != null)
		{
			$this->db->where('jenis_id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'kebutuhan' => $post['kebutuhan'],
			'created' => date('Y-m-d H:i:s')
		];

		$this->db->insert('jenis',$params);
	}

	public function edit($post)
	{
		$params = [
					'kebutuhan' => $post['kebutuhan'],
					'updated' => date('Y-m-d H:i:s')
					];

			$this->db->where('jenis_id', $post['id']);
			$this->db->update('jenis', $params);
	}

	public function del($id)
									{
										$this->db->where('jenis_id', $id);
										$this->db->delete('jenis');
									}
}