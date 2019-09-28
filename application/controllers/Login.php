<?php 
 
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
 
	function index(){
		$this->session->sess_destroy();
		$data['jscallurl'] = "login/login.js";
		$this->load->view('login/login', $data);
	}

	function validasi(){
		$data = $this->input->post();
		$search[0]['type']="where";
		$search[0]['value']=$data;
		$this->load->model('M_Login');
		$db_call = $this->M_Login->get_login($search);
		unset($data);
		if($db_call['status']=='1'){
			$data['data'] = $db_call['isi']->result();
		}else{
			$data['error_message'] = $db_call['message'];
		}
		echo json_encode($data);
	}

	function set_session(){
		$data = $this->input->post();
		$data_user = "";
		switch($data['jabatan']){
			case "A": 
				$this->load->model('M_Admin');
				$search[0]['type']="where";
				$search[0]['value']=array('nik'=>$data['id_user']);
				$data_user=$this->M_Admin->get_admin($search);
			break;
			case "M": 
				$this->load->model('M_Mahasiswa');
				$search[0]['type']="where";
				$search[0]['value']=array('npm'=>$data['id_user']);
				$data_user=$this->M_Mahasiswa->get_mahasiswa($search);
			break;
			case "D":
				$this->load->model('M_Dosen');
				$search[0]['type']="where";
				$search[0]['value']=array('nik'=>$data['id_user']);
				$data_user=$this->M_Dosen->get_dosen($search);
			break;
		}
		$data['nama'] = $data_user['isi']->row()->nama;
		$data['prodi'] = $data_user['isi']->row()->prodi;
		$this->session->set_userdata($data);
		$this->load->helper('auth');
		
		redirect(CallLogin($data));
	}
}