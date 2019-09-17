<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$con_config['navigation'] = "nav_admin";
		if(isset($_SESSION['notification'])){
			$con_config['notification'] = $_SESSION['notification'];
		}
		$this->con_config = $con_config;
	}

	public function index()
	{
		$this->session->set_flashdata('notification', array('message'=>'Tes Alert', 'status'=>'success', 'config'=>'top-end'));
		$data['nav_active'] = "dashboard";
		$data['nav_open'] = "";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/admin_dash', $data);
		//$this->load->view('common/footer');
	}
	public function kegiatan()
	{
		$data['nav_active'] = "kegiatan";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/index', $data);
		//$this->load->view('common/footer');
	}
	public function dosen()
	{
		$data['nav_active'] = "dosen";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/data_dosen', $data);
		//$this->load->view('common/footer');
	}

}
