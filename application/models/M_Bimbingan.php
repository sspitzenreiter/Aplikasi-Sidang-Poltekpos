<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bimbingan extends CI_Model {

  public function get_bimbingan($cond=""){
    $this->db->select("*");
    $this->db->from("bimbingan");
    //$this->db->where('npm', '1174040');
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
        }else if($key=="group_by"){
          $this->db->group_by($value);
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

  public function get_jumlah_bimbingan($id_proyek){
    $this->db->select('count(*) as total_bimbingan');
    $this->db->from('bimbingan');
    $this->db->where(array('status_bimbingan'=>'1', 'id_proyek'=>$id_proyek));
    return $this->db->get()->row_array();
  }

  public function insert($data){
    $query = $this->db->insert('bimbingan', $data);
    if($query){
      return array('status'=>'1','isi'=>$query);
    }else{
      return array('status'=>'0', 'message'=>$this->db->error());
    }
  }

  public function update($data, $where)
	{
		$this->db->where($where);
    if($this->db->update('bimbingan',$data)){
      return array('status'=>'1');
    }else{
      return array('status'=>'0', 'message'=>$this->db->error());
    }
	}

}
