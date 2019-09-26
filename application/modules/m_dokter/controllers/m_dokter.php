<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('md_dokter');


	}

	public function index()
		{

			$data['judul']="Master Dokter";
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
			 $data=$this->md_dokter->ambil_semua('m_dokter');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_dokter' => $id,
										);

						$data = $this->md_dokter->ambilid('m_dokter',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_dokter = $_POST['nama_dokter'];


		 if($nama_dokter == ''){
			 $result['pesan']='Nama Dokter Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_dokter' => $nama_dokter ,

										);
										 $this->md_dokter->insert('m_dokter',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

					$nama_dokter = $_POST['nama_dokter'];

				 	$id = $_POST['id'];
				 	$where = array('id_dokter' =>$id , );

				 	if($nama_dokter == ''){
				 		$result['pesan']='Nama Dokter Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
				 								$data = array('nama_dokter' => $nama_dokter ,

				 								 );
				 									$this->md_dokter->update('m_dokter',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_dokter' => $id,
						 				);
						$this->md_dokter->hapus('m_dokter',$data);

					}
}
