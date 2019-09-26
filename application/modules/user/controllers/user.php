<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_user');


	}

	public function index()
		{

			$data['judul']="Master User";
			$data['nama_user'] = $this->session->userdata('nama');
			 $this->load->view('page_dashboard',$data);
			 	$this->cek_menu($this->session->userdata('level'));
			  // $this->load->view('left_menu',$data);
				 $this->load->view('content',$data);

	  }

	function cek_menu($status)
			{
						if($status == 'admin'){
						 $this->load->view('left_menu_admin');
						} else if ($status == 'maintenage'){
								 $this->load->view('left_menu_maintenage');
						} else {
								 $this->load->view('left_menu_user');

						}
			}


	function data(){
			 $data=$this->m_user->ambil_semua('m_user');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_user' => $id,
										);

						$data = $this->m_user->ambilid('m_user',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_pengguna = $_POST['nama_pengguna'];
		 $username = $_POST['username'];
		 $password =md5($_POST['password']);
		 $level = $_POST['level'];
		 $tanggal_input = date('Y-m-d');

		 if($nama_pengguna == ''){
			 $result['pesan']='Nama Pengguna Harus di isi !';
		 } elseif($username == ''){
					 $result['pesan']='Username Harus di isi !';
				 } else {
						 $result['pesan']='';
									 $data = array('nama_user' => $nama_pengguna ,
																 'username' => $username,
																 'password' => $password,
																 'level' =>$level,
																 'tanggal_input' =>$tanggal_input
										);
										 $this->m_user->insert('m_user',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

					$nama_pengguna = $_POST['nama_pengguna'];
					$username = $_POST['username'];
					$password =md5($_POST['password']);
					$level = $_POST['level'];
					$tanggal_input = date('Y-m-d');
				 	$id = $_POST['id'];
				 	$where = array('id_user' =>$id , );

				 	if($nama_pengguna == ''){
				 		$result['pesan']='Nama Pengguna Harus di isi !';
				 	} elseif($username == ''){
				 				$result['pesan']='Username Harus di isi !';
				 			} else {
				 					$result['pesan']='';
				 								$data = array('nama_user' => $nama_pengguna ,
				 															'username' => $username,
				 															'password' => $password,
				 															'level' =>$level,
																			'tanggal_input' =>$tanggal_input
				 								 );
				 									$this->m_user->update('m_user',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_user' => $id,
						 				);
						$this->m_user->hapus('m_user',$data);

					}
}
