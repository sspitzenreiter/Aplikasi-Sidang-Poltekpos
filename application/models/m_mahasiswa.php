<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    public function get_mahasiswa($cond=""){
    $this->db->select("*");
    $this->db->from("mahasiswa");
    $this->db->where('npm', '1174040');
		//Dari sini mah bukan contoh, ini mah buat kondisi dinamis
		if($cond!=""){
			foreach($cond as $row){
				$key = $row['type'];
				$value = $row['value'];
				if($key=="where"){
					$this->db->where($value);
				}else if($key=="where_in"){
					for($a=0;$a<sizeof($value); $a++){
						$this->db->where_in($value[$a]['name'], $value[$a]['value']);
					}
				}else if($key=="order_by"){
					$this->db->order_by($value);
				}else if($key=="limit"){
					$this->db->limit($value);
				}
			}
		}
		//end of kondisi dinamis
    $isi = $this->db->get();
		if($isi){
			return array('status'=>'1','isi'=>$isi);
		}else{
			return array('status'=>'0', 'message'=>$this->db->error());
		}
	}

public function update(){
		$npm = $this->input->post('txt_hidden');
		$field = array(
			'nama'=>$this->input->post('txt_namamahasiswa'),
			'alamat'=>$this->input->post('txt_alamatmahasiswa'),
			'angkatan'=>$this->input->post('txt_angkatanmahasiswa'),
			'tempat_lahir'=>$this->input->post('txt_tmptlhrmahasiswa'),
			'tgl_lahir'=>$this->input->post('txt_tgllhrmahasiswa')
			);
		$this->db->where('npm', '1174040');
		$this->db->update('mahasiswa', $field);
		echo $this->db->last_query();extit;
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}