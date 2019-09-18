<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koordinator extends CI_Controller {


	public $con_config;
	public function __construct(){
		parent::__construct();
		$con_config['navigation'] = "nav_koor";
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
		$this->load->view('koordinator/koor_dash',$data);
		//$this->load->view('common/footer');
	}

	public function approve()
	{
		$data['nav_active'] = "approval_proposal";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('koordinator/koor_app',$data);
		//$this->load->view('common/footer');
	}

	public function jadwal()
	{
		$data['nav_active'] = "jadwal";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('koordinator/koor_jadwal',$data);
		//$this->load->view('common/footer');
	}
	public function nilai()
	{
		$data['nav_active'] = "nilai";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('koordinator/koor_nilai',$data);
		//$this->load->view('common/footer');
	}

}
