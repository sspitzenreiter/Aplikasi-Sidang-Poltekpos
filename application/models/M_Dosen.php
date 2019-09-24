<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dosen extends CI_Model {

	public function insert_dosen($data)
	{
    if($this->db->insert('dosen',$data)){
      return array('status'=>'1');
    }else{
      return array('status'=>'0', 'message'=>$this->db->error());
    }
	}

	public function get_dosen($cond=""){
    $this->db->select("*");
    $this->db->from("dosen");
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
				}else if($key=="where_not_in"){
					for($a=0;$a<sizeof($value); $a++){
						$this->db->where_not_in($value[$a]['name'], $value[$a]['value']);
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

	 public function update($data){
		$nik = $data['txt_hidden'];
		$field = array(
			'nama'=>$data['txt_namadosen'],
			'alamat'=>$data['txt_alamatdosen'],
			'angk'=>$data['txt_angkatandosen'],
			'tempat_lahir'=>$data['txt_tmptlhrdosen'],
			'tgl_lahir'=>$data['txt_tgllhrdosen'],
			'judul_jurnal'=>$data['txt_juduljurnal'],
			'link_jurnal'=>$data['txt_linkjurnal'],
			'research_interest'=>$data['txt_research']
			);
		$this->db->where('nik', $nik);
		$isi = $this->db->update('dosen', $field);
    if($isi){
			return array('status'=>'1');
		}else{
			return array('status'=>'0', 'message'=>$this->db->error());
		}
	}
}
