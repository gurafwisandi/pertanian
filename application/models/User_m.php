<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model
{

	public function login($post)
  {
    
    $this->db->select('*');
    $this->db->from('user');
		$this->db->where('email', $post['email']);
		$this->db->where('password', md5($post['password']));
    
    $query = $this->db->get();
    return $query;
  }
  
  public function get($id =null)
  {
    $this->db->from('user');
    if ($id != null){
      $this->db->join('koperasi', 'koperasi.user_id = user.user_id');
      $this->db->where('user.user_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
            {
              $params = [
                'nama' => $post['nama'],
                'jabatan' => $post['jabatan'],
                'nip' => $post['nip'],
                'username' => $post['username'],
                'email' => $post['email'],
                'password' => sha1($post['password']),
              ];

              $this->db->insert('user', $params);

            }
  public function edit($post)
            {
              $params = [
                'nama' => $post['nama'],
                'jabatan' => $post['jabatan'],
                'nip' => $post['nip'],
                'username' => $post['username'],
                'email' => $post['email'],
                'password' => sha1($post['password']),
              ];
              $this->db->where('user_id',$post['id']);
              $this->db->update('user',$params);

            }

  public function del($id)
                  {
                    $this->db->where('user_id', $id);
                    $this->db->delete('user');
                  }

}