<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	public function index()
	{
		$data['judul']="<b>SIOPKOL</b> RSUD WARAS WIRIS";
		$this->load->view('page_login',$data);

  }
	public function cek()
	{
	$pesan = '';
	$status = 0;
	$url = '';
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		if($username ==''){
		$pesan =  "Username Tidak Boleh Kosong...";
		} else if($password== ''){
			$pesan =  "Password Tidak Boleh Kosong...";
		}else{
			$pesan =  "Tunggu Sebentar...";

			$where = array('username' => $username ,
											'password' => md5($password) ,
		 								);

	$status = 1;
			$cek = $this->m_login->cek_login("m_user",$where)->num_rows();
			if($cek > 0){
				$ambil = $this->m_login->cek_login("m_user",$where)->result_array();
				$data_session = array(
						'nama' => $ambil[0]['nama_user'],
						'level' => $ambil[0]['level'],
						'id_user' => $ambil[0]['id_user'],
						'status' => 'login',
						'tanggal' => date('Y-m-d')
						);
						$this->session->set_userdata($data_session);
						$url = base_url('dashboard');


			} else {

					$url = base_url('auth');
			}


		}


		$data = array('url' =>$url ,
		'pesan' =>$pesan,
		'status' => $status
		 );
	echo 	json_encode($data);


	}

	 function logout()
	{
	$this->session->sess_destroy();
	redirect(base_url('auth'));
	}

}
