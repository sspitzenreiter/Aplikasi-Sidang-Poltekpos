<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Dosen', 'm');
		$con_config['navigation'] = "nav_dosen";
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
}
