<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    public function get_mahasiswa($cond=""){
    $this->db->select("*");
    $this->db->from("mahasiswa");
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

  public function insert_mahasiswa($data)
  {
    if($this->db->insert('mahasiswa',$data)){
      return array('status'=>'1');
    }else{
      return array('status'=>'0', 'message'=>$this->db->error());
    }
    //$this->load->view('common/footer');
  }

  public function update($data){
		$npm = $data['txt_hidden'];
		$field = array(
			'nama'=>$data['txt_namamahasiswa'],
			'alamat'=>$data['txt_alamatmahasiswa'],
			'angkatan'=>$data['txt_angkatanmahasiswa'],
			'tempat_lahir'=>$data['txt_tmptlhrmahasiswa'],
			'tgl_lahir'=>$data['txt_tgllhrmahasiswa']
			);
		$this->db->where('npm', $npm);
		$isi = $this->db->update('mahasiswa', $field);
    if($isi){
			return array('status'=>'1');
		}else{
			return array('status'=>'0', 'message'=>$this->db->error());
		}
	}

  public function getAngkatan(){
    $this->db->distinct();
    $this->db->select("angkatan");
    $this->db->from('mahasiswa');
    $this->db->order_by('angkatan');
    return $this->db->get();
  }

}
