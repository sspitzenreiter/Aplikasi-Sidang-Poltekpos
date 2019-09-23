<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Mahasiswa', 'm');
		$con_config['navigation'] = "nav_mhsw";
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
		$search[0]['type']="where";
		$search[0]['value']=array('npm'=>'1174000');
		$db_call = $this->m->get_mahasiswa($search);
		if($db_call['status']=='1'){
			$data['data_mahasiswa'] = $db_call['isi'];
		}else{
			$data['error_message'] = json_encode($db_call['message']);
		}
		$data = array_merge($data, $this->con_config);

		$this->load->view('mahasiswa/mhsw_dash',$data);
		//$this->load->view('common/footer');
	}
	public function detail()
	{
		$data['nav_active'] = "detail_kegiatan";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('mahasiswa/dtl_mhsw',$data);
		//$this->load->view('common/footer');
	}
	public function bimbingan()
	{
		$data['nav_active'] = "bimbingan";
		$data['nav_open'] = "menu";
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
		redirect(base_url('Mahasiswa/'));
	}
}
