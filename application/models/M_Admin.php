<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function get_dosen(){
		$this->db->select("*");
		$this->db->from("dosen");
		return $this->db->get();
	}


}
