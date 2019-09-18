<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function insert_mahasiswa($data)
	{
    if($this->db->insert('mahasiswa',$data)){
      return array('status'=>'1');
    }else{
      return array('status'=>'0', 'message'=>$this->db->error());
    }
		//$this->load->view('common/footer');
	}

	public function get_dosen(){
		$this->db->select("*");
		$this->db->from("dosen");
		return $this->db->get();
	}

	
}
