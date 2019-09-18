<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    public function getMhs(){
         $this->db->select('*');
        $this->db->where('npm', '1174040');
        $q = $this->db->get('mahasiswa');
        $result = $q->result_array();
        return $result;
    }



}