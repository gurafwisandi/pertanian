<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Dashboard_m extends CI_Model
{

	public function JumlahPengajuan()
	{   
	    $query = $this->db->get('pengajuan');
	    if($query->num_rows()>0) {
	      return $query->num_rows();
	    } else {
	      return 0;
	    }
	}

	public function JumlahPetani()
	{   
	    $query = $this->db->get('petani');
	    if($query->num_rows()>0) {
	      return $query->num_rows();
	    } else {
	      return 0;
	    }
	}

	public function JumlahKoperasi()
	{   
	    $query = $this->db->get('koperasi');
	    if($query->num_rows()>0) {
	      return $query->num_rows();
	    } else {
	      return 0;
	    }
	}

	public function JumlahMonev()
	{   
	    $query = $this->db->get('tanam');
	    if($query->num_rows()>0) {
	      return $query->num_rows();
	    } else {
	      return 0;
	    }
	}
}