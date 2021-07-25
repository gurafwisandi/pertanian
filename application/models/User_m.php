<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model
{
  public function cek_email($email)
  {
    $this->db->from('user');
    $this->db->where('user.email', $email);
    $query = $this->db->get();
    return $query;
  }
  public function add_user()
  {
		$this->db->set('email', $this->input->post('email'));
    $this->db->set('password', sha1($this->input->post('password')));
		$this->db->set('level', '2');
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->insert('user');
    $user_id=$this->db->insert_id();

		$this->db->set('user_id', $user_id);
		$this->db->set('koperasi', $this->input->post('koperasi'));
		$this->db->set('ketua', $this->input->post('ketua'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('telpon', $this->input->post('telpon'));
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->insert('koperasi');
  }

	public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('koperasi', 'koperasi.user_id = user.user_id','left');
		$this->db->where('status', '1');
		$this->db->where('email', $post['email']);
		$this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }
  public function get($id)
  {
    $this->db->from('user');
    $this->db->join('koperasi', 'koperasi.user_id = user.user_id');
		$this->db->where('user.user_id', $id);
    $query = $this->db->get();
    return $query;
  }
  
  public function get_koperasi()
  {
    $this->db->from('user');
    $this->db->join('koperasi', 'koperasi.user_id = user.user_id');
		$this->db->where('level', '2');
    $query = $this->db->get();
    return $query;
  }
  
  public function get_dinas()
  {
    $this->db->from('user');
    $this->db->join('koperasi', 'koperasi.user_id = user.user_id');
		$this->db->or_where('level', '1');
		$this->db->or_where('level', '3');
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
      'level' => $post['level'],
      'email' => $post['email'],
      'password' => sha1($post['password']),
    ];
    $this->db->insert('user', $params);
    $user_id=$this->db->insert_id();

    $koperasi_id=$post['koperasi_id'];
		$this->db->set('user_id', $user_id);
		$this->db->where('koperasi_id', $koperasi_id);
		$this->db->update('koperasi');
  }
  public function update_user($koperasi_id,$nm_file)
  {
		$this->db->set('foto', $nm_file);
		$this->db->where('koperasi_id', $koperasi_id);
		$this->db->update('koperasi');
  }
  public function add_dinas($post)
  {
		$this->db->set('email', $this->input->post('email'));
    $this->db->set('password', sha1($this->input->post('password')));
		$this->db->set('level', $this->input->post('level'));
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->insert('user');
    $user_id=$this->db->insert_id();

		$this->db->set('user_id', $user_id);
    if($this->input->post('level') == '1'){
      $this->db->set('koperasi', 'Dinas');
    }else{
      $this->db->set('koperasi', 'Admin');
    }
		$this->db->set('ketua', $this->input->post('ketua'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('telpon', $this->input->post('telpon'));
		$this->db->set('nip', $this->input->post('nip'));
		$this->db->set('jabatan', $this->input->post('jabatan'));
		$this->db->set('created', date('Y-m-d H:i:s'));
		$this->db->insert('koperasi');
    $id_koperasi=$this->db->insert_id();

    return $id_koperasi;
  }
  public function edit($post)
  {
    if($post['password'] != $post['password_old']){
      $this->db->set('password', sha1($this->input->post('password')));
      $params = [
        'update' => date('Y-m-d H:i:s'),
        'email' => $post['email'],
        'status' => $post['status'],
        'password' => sha1($post['password']),
      ];
    }else{
      $params = [
        'update' => date('Y-m-d H:i:s'),
        'email' => $post['email'],
        'status' => $post['status'],
      ];
    }
    $this->db->where('user_id',$post['id']);
    $this->db->update('user',$params);
  }
  public function edit_dinas($post)
  {
    if($post['password'] != $post['password_old']){
      $this->db->set('password', sha1($this->input->post('password')));
      $params = [
        'update' => date('Y-m-d H:i:s'),
        'level' => $post['level'],
        'email' => $post['email'],
        'status' => $post['status'],
        'password' => sha1($post['password']),
      ];
    }else{
      $params = [
        'update' => date('Y-m-d H:i:s'),
        'level' => $post['level'],
        'email' => $post['email'],
        'status' => $post['status'],
      ];
    }
    $this->db->where('user_id',$post['id']);
    $this->db->update('user',$params);

    
    $par = [
      'update' => date('Y-m-d H:i:s'),
      'nip' => $post['nip'],
      'ketua' => $post['ketua'],
      'jabatan' => $post['jabatan'],
      'alamat' => $post['alamat'],
      'telpon' => $post['telpon'],
    ];
		$this->db->where('koperasi_id', $post['koperasi_id']);
    $this->db->update('koperasi',$par);
  }
  public function approve($post)
  {
    $params = [
      'update' => date('Y-m-d H:i:s'),
      'status' => $post['status'],
    ];
    $this->db->where('user_id',$post['id']);
    $this->db->update('user',$params);
  }
  public function approve_dinas($post)
  {
    $params = [
      'update' => date('Y-m-d H:i:s'),
      'status' => $post['status'],
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