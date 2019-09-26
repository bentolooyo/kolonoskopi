<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ruang extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('md_ruang');


	}

	public function index()
		{

			$data['judul']="Master Ruang";
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
			 $data=$this->md_ruang->ambil_semua('m_ruang');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_ruang' => $id,
										);

						$data = $this->md_ruang->ambilid('m_ruang',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_kelas = $_POST['nama_kelas'];


		 if($nama_kelas == ''){
			 $result['pesan']='Nama Kelas / Ruang Asal Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_kelas' => $nama_kelas ,

										);
										 $this->md_ruang->insert('m_ruang',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

				 $nama_kelas = $_POST['nama_kelas'];

				 	$id = $_POST['id'];
				 	$where = array('id_ruang' =>$id , );

				 	if($nama_kelas == ''){
				 		$result['pesan']='Nama Ruang Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
				 								$data = array('nama_kelas' => $nama_kelas,

				 								 );
				 									$this->md_ruang->update('m_ruang',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_ruang' => $id,
						 				);
						$this->md_ruang->hapus('m_ruang',$data);

					}
}
