<?php defined ('BASEPATH') OR exit('No direct script access allowed');

class Koperasi_m extends CI_Model
{
	public function get($id = null)
	{
		
		$this->db->select('koperasi.*,user.nama as user_nama');
		$this->db->from('koperasi');
		$this->db->join('user','user.user_id = koperasi.user_id');
		
		if($id !=null){
			$this->db->where('koperasi_id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
						{
							$params = [
								'nama' => $post['nama'],
								'ketua' => $post['ketua'],
								'alamat' => $post['alamat'],
								'telpon' => $post['telpon'],
								'user_id' => $post['create_by'],
								'created' => date('Y-m-d H:i:s')
							];

							$this->db->insert('koperasi', $params);

						}
	public function edit($post)
						{
							$params = [
								'nama' => $post['nama'],
								'ketua' => $post['ketua'],
								'alamat' => $post['alamat'],
								'telpon' => $post['telpon'],
								'user_id' => $post['create_by'],
								'created' => date('Y-m-d H:i:s')
							];
							$this->db->where('koperasi_id',$post['id']);
							$this->db->update('koperasi',$params);

						}

	public function del($id)
									{
										$this->db->where('koperasi_id', $id);
										$this->db->delete('koperasi');
									}
}