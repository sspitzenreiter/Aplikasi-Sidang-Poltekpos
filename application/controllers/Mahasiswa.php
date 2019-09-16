<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$con_config['navigation'] = "nav_mhsw";
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
}
