<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Mahasiswa');
		$this->load->model('M_Kegiatan');
		$this->load->model('M_Proyek');
		$this->load->model('M_Bimbingan');
		$con_config['navigation'] = "nav_mhs";
		$this->load->helper('auth');
		
		
		if(isset($_SESSION['notification'])){
			$con_config['notification'] = $_SESSION['notification'];
			if(!isset($con_config['notification']['type'])){
				$con_config['notification']['type'] = "normal";
			}
			$con_config['notification'] = json_encode($con_config['notification']);
		}
		$con_config['profile_link'] = base_url('Mahasiswa/Profile');
		$con_config['profile_name'] = $_SESSION['nama'];
		$this->CekProyek();
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

	public function CekProyek(){
		$search[0]['type']="where";
		$search[0]['value']=array('npm'=>$_SESSION['id_user']);
		$data = json_decode($this->Tampil_Data('detail', "", $search), true);
		if($data['num_rows']>0){
			if($data['data'][0]['status']=="1"){
				$this->session->set_userdata('id_proyek', $data['data'][0]['id_proyek']);
			}
		}
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
				$search[0]['value']=array('npm'=>$_SESSION['id_user']);
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
				$search[0]['value'] = array('prodi'=>$_SESSION['prodi']);
				echo $this->Tampil_Data($this->input->post('config'), "",$search);
			break;
			case "Insert":
				$data = $this->input->post();
				$data['npm'] = $_SESSION['id_user'];
				$data['status']="1";
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
			case "bimbingan":
				$query = $this->M_Bimbingan->insert($data);
				$notification['message']="Bimbingan berhasil ditambahkan";
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
			case "bimbingan": $db_call = $this->M_Bimbingan->get_bimbingan($query_extras); break;
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

	public function Bimbingan($a="")
	{
		if(isset($_SESSION['id_proyek'])){
			switch($a){
				case "": 
					$data['nav_active'] = "bimbingan";
					$data['nav_open'] = "kegiatan";
					$data['jscallurl']="mahasiswa/mhs_bimbingan.js";
					$data = array_merge($data, $this->con_config);
					$this->load->view('mahasiswa/mhs_bimb',$data);
				break;
				case "Data":
					$search[0]['type']="where";
					$search[0]['value']=array('id_proyek'=>$_SESSION['id_proyek']);
					echo $this->Tampil_Data('bimbingan', '', $search);
				break;
				case "Insert":
					$data = $this->input->post();
					$data['id_proyek'] = $_SESSION['id_proyek'];
					echo $this->Tambah_Data($data, 'bimbingan');
				break;
			}
		}else{
			$data['nav_active'] = "bimbingan";
			$data['nav_open'] = "kegiatan";
			$data = array_merge($data, $this->con_config);
			$this->load->view('mahasiswa/content_template/mhs_bimb_error', $data);
		}
		//$this->load->view('common/footer');
	}

	public function Ubah_Data($data, $where, $table){
		$query = "";
		switch($table){
			//case "dosen": $query = $this->M_Dosen->insert_dosen($data); break;
			case "profile" :
				$query = $this->M_Mahasiswa->update($data);
				$notification['message'] = "Profile Berhasil Diupdate";
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

	public function Profile($a="")
	{
		switch($a){
			case "":
				$search[0]['type']="where";
				$search[0]['value']=array('npm'=>$_SESSION['id_user']);
				$data['jscallurl']="mahasiswa/mhs_profile.js";
				$data['nav_open'] = "";
				$data['nav_active']="";
				$db_call = $this->M_Mahasiswa->get_mahasiswa($search);
				if($db_call['status']=='1'){
					$data['data_mahasiswa'] = $db_call['isi'];
				}else{
					$data['error_message'] = json_encode($db_call['message']);
				}
				$data = array_merge($data, $this->con_config);
				$this->load->view('mahasiswa/mhs_profile', $data);
			break;
			case "Update":
				$data = $this->input->post();
				echo $this->Ubah_Data($data, "", 'profile');
			break;
		}
	}
}
