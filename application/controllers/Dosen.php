<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$con_config['navigation'] = "nav_dosen";
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

	public function nilai()
	{
		$data['nav_active'] = "nilai";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('dosen/nilai_dosen',$data);
		//$this->load->view('common/footer');
	}

}
