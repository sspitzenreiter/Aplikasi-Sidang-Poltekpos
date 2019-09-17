<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $con_config;
	public function __construct(){
		parent::__construct();
		$con_config['navigation'] = "nav_admin";
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
		//$this->session->set_flashdata('notification', array('message'=>'Tes Alert', 'status'=>'success', 'title'=>'Apa anjing')); //Alert Ditengah
		$this->session->set_flashdata('notification', array('message'=>'Tes Alert', 'status'=>'success', 'type'=>'top-end')); //Alert di kanan atas
		$data['nav_active'] = "dashboard";
		$data['nav_open'] = "";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/admin_dash', $data);
	}

	public function kegiatan()
	{
		$data['nav_active'] = "kegiatan";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/index', $data);
	}

	public function dosen()
	{
		$data['nav_active'] = "dosen";
		$data['nav_open'] = "menu";
		$data = array_merge($data, $this->con_config);
		$this->load->view('admin/data_dosen', $data);
	}

	public function upload_data_excel(){
		$notification = array();
		if(isset($_FILES['file'])){
			$file = $_FILES['file']['tmp_name'];
			$filename = $_FILES['file']['name'];
			if(substr($filename, -4)==".xls" || substr($filename, -5)==".xlsx"){
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load($file); // Load file yang telah diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
				$data = array();
				$numrow = 0;
				$col = array();
				foreach($sheet as $row){
					if($numrow>0){
						$data_sub[$col['a']] = $row['A'];
						$data_sub[$col['b']] = $row['B'];
						array_push($data, $data_sub);
					}else{
						$col['a'] = $row['A'];
						$col['b'] = $row['B'];
					}
					$numrow++;
				}
				$this->load->model('M_Admin');
				$total_masuk=0;
				foreach($data as $row){
					$isi['npm'] = $row['npm'];
					$isi['nama'] = $row['nama'];
					if($this->M_Admin->insert_mahasiswa($isi)=='1'){
						$total_masuk++;
					}
				}
				if($total_masuk>0){
					$notification['status'] = "success";
					$notification['message'] = "Data sudah dimasukkan ke database";
					$notification['title'] = "YEAY!";
				}else{
					$notification['status'] = "warning";
					$notification['message'] = "Data tidak ada yang masuk sama sekali ke database";
					$notification['title'] = "Aww..";
				}
			}else{
				$notification['status'] = "error";
				$notification['message'] = "File bukan termasuk excel, Coba lagi yang lain deh";
				$notification['title'] = "Aduh";
			}
		}else{
			$notification['status'] = "error";
			$notification['message'] = "File belum terupload, Silahkan coba lagi!";
			$notification['title'] = "Aduh";
		}
		echo json_encode($notification);
	}
}
