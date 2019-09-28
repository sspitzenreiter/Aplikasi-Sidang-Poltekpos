<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Mahasiswa');
		$this->load->model('M_Kegiatan');
		$this->load->model('M_Proyek');
		$con_config['navigation'] = "nav_mhs";
		if(isset($_SESSION['notification'])){
			$con_config['notification'] = $_SESSION['notification'];
			if(!isset($con_config['notification']['type'])){
				$con_config['notification']['type'] = "normal";
			}
			$con_config['notification'] = json_encode($con_config['notification']);
		}
		$this->con_config = $con_config;
	}

	public function index()
	{

		$data['nav_active'] = "dashboard";
		$data['nav_open'] = "";
		
		$data = array_merge($data, $this->con_config);

		$this->load->view('mahasiswa/mhsw_dash',$data);
		//$this->load->view('common/footer');
	}
	public function Proyek($a="")
	{
		switch($a){
			case "":  
				$data['nav_active'] = "proyek";
				$data['nav_open'] = "kegiatan";
				$data['jscallurl'] = "mahasiswa/mhs_proyek.js";
				$data = array_merge($data, $this->con_config);
				$this->load->view('mahasiswa/mhs_proyek',$data);
			break;
			case "Data":  
				$search[0]['type']="where";
				$search[0]['value']="npm='1174035'";
				$data = json_decode($this->Tampil_Data('detail', "", $search), true);
				if($data['num_rows']<1){
					$data['col_config'] = "kegiatan";
				}else{
					$data['col_config'] = "detail";
				}
				$data = json_encode($data);
				echo $data;
			break;
			case "Content":
				$data = $this->input->post('content');
				switch($data){
					case "kegiatan": $data = "mhs_proyek_kegiatan"; break;
					case "detail": $data = "mhs_proyek_detail"; break;
				}
				$this->load->view('mahasiswa/content_template/'.$data);
			break;
			case "Data:Proyek":
				$search[0]['type']="where";
				$search[0]['value'] = "npm='1174035'";
				echo $this->Tampil_Data($this->input->post('config'), "",$search);
			break;
			case "Insert":
				$data = $this->input->post();
				$data['npm'] = "1174035";
				echo $this->Tambah_Data($data, 'detail');
			break;
		}
	}

	public function Tambah_Data($data, $table){
		$query = "";
		$notification = "";
		switch($table){
			case "detail":
				$query = $this->M_Proyek->insert($data);
				$notification['message']="Proyek berhasil ditambahkan";
			break;
		}

		if($query['status']=='1'){
			$notification['status'] = "success";
			if(!isset($notification['message'])){
				$notification['message'] = "Data berhasil disetor ke pusat data";
			}
			$notification['title'] = "YEAY!";
		}else{
			$notification['status'] = "error";
			$notification['message'] = "Terdapat error ".$query['message']['message']." (".$query['message']['code'].")";
			$notification['title'] = "Aww";
		}
		return json_encode($notification);
	}

	public function Tampil_Data($table, $data_extras="", $query_extras=""){
		$db_call = "";
		switch($table){
			case "kegiatan": $db_call = $this->M_Kegiatan->get_kegiatan($query_extras); break;
			case "detail": $db_call = $this->M_Proyek->get_proyek($query_extras); break;
		}

		if($db_call['status']=='1'){
			$data['data'] = $db_call['isi']->result();
			$data['num_rows'] = $db_call['isi']->num_rows();
			if($data_extras!=""){
				$data['extras'] = $data_extras;
			}
		}else{
			$data['error_message'] = $db_call['message'];
		}
		return json_encode($data);
	}

	public function Bimbingan()
	{
		$data['nav_active'] = "bimbingan";
		$data['nav_open'] = "proyek";
		$data = array_merge($data, $this->con_config);
		$this->load->view('mahasiswa/bimb_mhsw',$data);
		//$this->load->view('common/footer');
	}
	public function update(){
		$result = $this->m->update($this->input->post());
		if($result['status']=='1'){
			$this->session->set_flashdata(
				'notification',
				array(
					'message'=>'Update Berhasil',
					'status'=>'success',
					'type'=>'top-end'
				)
			);
		}else{
			$this->session->set_flashdata(
				'notification',
				array(
					'message'=>'Update Gagal',
					'status'=>'success',
					'type'=>'top-end'
				)
			);
		}
		redirect(base_url('Mahasiswa/profil'));
	}

	public function profil()
	{
		$data['nav_active'] = "profil";
		$data['nav_open'] = "";
		$search[0]['type']="where";
		$search[0]['value']=array('npm'=>'1174000');
		$db_call = $this->m->get_mahasiswa($search);
		if($db_call['status']=='1'){
			$data['data_mahasiswa'] = $db_call['isi'];
		}else{
			$data['error_message'] = json_encode($db_call['message']);
		}
		$data = array_merge($data, $this->con_config);
		$this->load->view('mahasiswa/profil_mhsw', $data);
		//$this->load->view('common/footer');
	}
}
