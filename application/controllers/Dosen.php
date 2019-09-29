<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Dosen');
		$this->load->model('M_Proyek');
		$con_config['navigation'] = "nav_dosen";
		$this->load->helper('auth');
		if(CallLogin($this->session->userdata, "D")!=""){
			redirect(CallLogin($this->session->userdata));
		}

		if(!isset($_SESSION['stat_koor'])){
			$this->load->model('M_Kegiatan');
			$search[0]['type']="where";
			$search[0]['value']=array('id_koordinator'=>$_SESSION['id_user']);
			$data = $this->M_Kegiatan->get_kegiatan($search);
			$stat_koor = "";
			if($data['isi']->num_rows()>0){
				$stat_koor['status']="1";
			}else{
				$stat_koor['status']="0";
			}
			$this->session->set_userdata('stat_koor', $stat_koor);
		}
		
		if(isset($_SESSION['stat_koor'])){
			if($_SESSION['stat_koor']['status']=="1"){
				$con_config['navigation_2'] = "nav_koor";
			}
		}
		
		$con_config['profile_name'] = $_SESSION['nama'];
		$con_config['profile_link'] = "";

		if(isset($_SESSION['notification'])){
			$con_config['notification'] = $_SESSION['notification'];
		}

		if($this->input->post('notification')!=null){
			$con_config['notification'] = $this->input->post('notification');
		}

		if(isset($con_config['notification'])){
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
		$this->load->view('dosen/dosen_dash',$data);
		//$this->load->view('common/footer');
	}

	public function bimbingan()
	{
		$data['nav_active'] = "bimbingan";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/bimb_dosen',$data);
		//$this->load->view('common/footer');
	}

	public function nilai_pembimbing()
	{

		$data['nav_active'] = "nilai_pembimbing";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/nilai_pembimbing',$data);
		//$this->load->view('common/footer');
	}
	public function nilai_penguji()
	{

		$data['nav_active'] = "nilai_penguji";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/nilai_penguji',$data);
		//$this->load->view('common/footer');
	}

	public function detil_proyek(){
		
		$data['nav_active'] = "dashboard";
		$data['nav_open'] = "";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/detil_proyek',$data);
	}
	public function detil_bimbingan(){
		
		$data['nav_active'] = "bimbingan";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/detil_bimbingan',$data);
	}

	public function profil()
	{
		$data['nav_active'] = "profil";
		$data['nav_open'] = "";
		$search[0]['type']="where";
		$search[0]['value']=array('nik'=>'112313');
		$db_call = $this->m->get_dosen($search);
		if($db_call['status']=='1'){
			$data['data_dosen'] = $db_call['isi'];
		}else{
			$data['error_message'] = json_encode($db_call['message']);
		}
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/profil_dosen', $data);
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
		redirect(base_url('dosen/profil'));
	}

	public function Tampil_Data($table, $data_extras="", $query_extras=""){
		$db_call = "";
		switch($table){
			case "approval": $db_call = $this->M_Proyek->get_proyek($query_extras); break;
			case "dosen": $db_call = $this->M_Dosen->get_dosen($query_extras); break;
		}
		if($db_call['status']=='1'){
			$data['data'] = $db_call['isi']->result();
			if($data_extras!=""){
				$data['extras'] = $data_extras;
			}
		}else{
			$data['error_message'] = $db_call['message'];
		}
		return json_encode($data);
	}

	public function Hapus_Data($data, $table){
		$query = "";
		switch($table){
			case "proyek":
				$query = $this->M_Proyek->delete($data);
				$notification['message']="Proyek sudah ditolak";
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

	public function Ubah_Data($data, $where, $table){
		$query = "";
		switch($table){
			//case "dosen": $query = $this->M_Dosen->insert_dosen($data); break;
			case "proyek" :
				$query = $this->M_Proyek->update($data, $where);
				$notification['message'] = "Proyek Berhasil Di Approve";
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
		echo json_encode($notification);
	}

	//Koordinator

	public function Approval($a="")
	{
		switch($a){
			case "":
				$data['jscallurl']="dosen/koor_app.js";
				$data['nav_active'] = "approval_proposal";
				$data['nav_open'] = "koordinator";
				$data = array_merge($data, $this->con_config);
				$this->load->view('koordinator/koor_app',$data);
			break;
			case "Data":
				$search[0]['type']="where";
				$search[0]['value']=array('kegiatan.prodi'=>$_SESSION['prodi']);
				$search[1]['type']="where";
				$search[1]['value']=array('proyek.status'=>'0');
				$search[2]['type']="group_by";
				$search[2]['value']="proyek.id_kegiatan";
				echo $this->Tampil_Data('approval', "", $search);
			break;
			case "Tolak":
				$data = $this->input->post();
				echo $this->Hapus_Data($data, 'proyek');
			break;
			case "PilihPembimbing":
				$data['nav_active'] = "approval_proposal";
				$data['nav_open'] = "koordinator";
				$data['jscallurl'] = "dosen/koor_app_pembimbing.js";
				$data = array_merge($data, $this->con_config);
				$this->session->set_flashdata('id_proyek', $this->input->post('id_proyek'));
				$this->session->set_flashdata('judul_proyek', $this->input->post('judul_proyek'));
				$this->load->view('admin/data_dosen', $data);
			break;
			case "PilihPembimbing:Data":
				$search[0]['type']="where";
				$search[0]['value']="nik not in (select id_koordinator from kegiatan)";
				$search[1]['type']="where";
				$search[1]['value']=array('prodi'=>$_SESSION['prodi']);
				echo $this->Tampil_Data('dosen', array('id_proyek'=>$_SESSION['id_proyek'], 'judul_proyek'=>$_SESSION['judul_proyek']), $search);
			break;
			case "PilihPembimbing:Update":
				$data = $this->input->post();
				$data['status']="1";
				$where = array('id_proyek'=>$data['id_proyek']);
				echo $this->Ubah_Data($data, $where, 'proyek');
			break;
			case "PilihPembimbing:Sukses":
				$data = $this->input->post();
				$this->session->set_flashdata('notification', json_decode($data['notification'], true));
				redirect($data['link']);
			break;
		}
		//$this->load->view('common/footer');
	}
}
