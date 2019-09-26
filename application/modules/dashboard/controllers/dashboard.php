<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

		// print_r($this->session->userdata());
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		}
		$this->load->model('m_dashboard');


	}

	public function index()
		{


			$datas = $this->m_dashboard->jumlah_hariini();
			$data['jumlah_hariini']=$datas[0]['jumlah_hariini'];

			$datat = $this->m_dashboard->jumlah_satubulan();
			$data['jumlah_satubulan']=$datat[0]['jumlah_satubulan'];

			$datav = $this->m_dashboard->jumlah_beluminput();
			$data['jumlah_beluminput']=$datav[0]['jumlah_beluminput'];

			$datav = $this->m_dashboard->jumlah_keseluruhan();
			$data['jumlah_keseluruhan']=$datav[0]['jumlah_keseluruhan'];

			$data['judul']="Dashboard Kolonoskopi";
			$data['nama_user'] = $this->session->userdata('nama');
			$this->load->view('page_dashboard',$data);
			$this->cek_menu($this->session->userdata('level'));

			$data['semua_bulan'] = $this->m_dashboard->semua_bulan();

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

}
