<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_pasien extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_pasien');


	}

	public function index()
		{

			$data['judul']="Transaksi Pasien";
			$data['nama_user'] = $this->session->userdata('nama');
			 $this->load->view('page_dashboard',$data);
			 	$this->cek_menu($this->session->userdata('level'));
			  // $this->load->view('left_menu',$data);
				 $this->load->view('content',$data);

	  }

		public function form_tambah()
			{

				$data['judul']="Tambah Pasien";
			$data['barcode'] =	$this->m_pasien->kode_otomatis();
				$data['nama_user'] = $this->session->userdata('nama');
				 $this->load->view('page_dashboard',$data);
					$this->cek_menu($this->session->userdata('level'));
					// $this->load->view('left_menu',$data);
					 $this->load->view('form_tambah',$data);

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


	function data($tanggal_awal,$tanggal_akhir){
			 $data=$this->m_pasien->ambil_semua('t_pasien',$tanggal_awal,$tanggal_akhir);
			 echo json_encode($data);
	 }



	 	function cetak_data($tanggal_awal,$tanggal_akhir){
			$data['tanggal_awal'] = $tanggal_awal;
			$data['tanggal_akhir'] = $tanggal_akhir;

	 			 $data['pasien']=$this->m_pasien->ambil_semua('t_pasien',$tanggal_awal,$tanggal_akhir);
				 $this->load->view('cetak_hasil_data',$data);
	 			 //echo json_encode($data);
	 	 }

	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_pasien' => $id,
										);

						$data = $this->m_pasien->ambilid('t_pasien',$id);

						echo json_encode($data);
		}




function hapus(){
						$id = $_POST['id'];

						$data = array('id_pasien' => $id,
						 				);
						$this->m_pasien->hapus('t_pasien',$data);

					}
function data_ruang(){
					$data=$this->m_pasien->ambil_ruang('m_ruang');
					 echo json_encode($data);
								  	 }
function data_dokter(){
					 $data=$this->m_pasien->ambil_dokter('m_dokter');
						 echo json_encode($data);
								 }
public function proses_daftar()
{

	$kode_otomatis = $this->m_pasien->kode_otomatis();
	$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		 $configs['cacheable']    = true; //boolean, the default is true
		 $configs['cachedir']     = './assets/'; //string, the default is application/cache/
		 $configs['errorlog']     = './assets/'; //string, the default is application/logs/
		 $configs['imagedir']     = './assets/qrbarcode/'; //direktori penyimpanan qr code
		 $configs['quality']      = true; //boolean, the default is true
		 $configs['size']         = '1024'; //interger, the default is 1024
		 $configs['black']        = array(224,255,255); // array, default is array(255,255,255)
		 $configs['white']        = array(70,130,180); // array, default is array(0,0,0)
		 $this->ciqrcode->initialize($configs);
		 $image_name=$kode_otomatis.'.png'; //buat name dari qr code sesuai dengan nim
		 $params['data'] = $kode_otomatis; //data yang akan di jadikan QR CODE
		 $params['level'] = 'H'; //H=High
		 $params['size'] = 10;
		 $params['savename'] = FCPATH.$configs['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		 $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	// 1. [barcode] => KLRSWW0000003
	$barcode = $_POST['barcode'];
	// 2. [tanggal_input] => 2019-09-16
	$tanggal_input = $_POST['tanggal_input'];
	$no_rm = $_POST['no_rm'];
	// 3. [nama_pasien] => Surtinah
		$nama_pasien = $_POST['nama_pasien'];
	// 4. [tempat_lahir] => Boyolali
		$tempat_lahir = $_POST['tempat_lahir'];
	// 5. [tanggal_lahir] => 1921-05-05
		$tanggal_lahir = $_POST['tanggal_lahir'];
	// 6. [alamat] => Ngelo RT 05 / RW 01
		$alamat = $_POST['alamat'];
	// 7. [jenis_kelamin] => P
		$jenis_kelamin = $_POST['jenis_kelamin'];
	// 8. [id_ruang] => 3
		$id_ruang = $_POST['id_ruang'];
	// 9.  [id_dokter] => 1
		$id_dokter = $_POST['id_dokter'];
	// 10. [keluhan] => Bab Berdarah
		$keluhan = $_POST['keluhan'];
	// 11.[diagnosa] => F4
		$diagnosa = $_POST['diagnosa'];
	// 12.[alat] => KOLONOSKOPI
		$alat = $_POST['alat'];
	// 13. [obat_prev] => Bio
		$obat_pre = $_POST['obat_prev'];
	// 14.[perkiraan_operasi] => 2019-09-19
		$perkiraan_operasi = $_POST['perkiraan_operasi'];
	// 15. id_pasien
	//====Otomatis
	// yang belum
	// 16. Status
	// 17. saran
	// 18. hasil
	// 19. kesimpulan

	$data = array('barcode' => $barcode ,
	'tanggal_input' => $tanggal_input ,
	'no_rm' => $no_rm ,
	'nama_pasien' => $nama_pasien ,
	'tempat' => $tempat_lahir ,
	'tanggal_lahir' => $tanggal_lahir ,
	'alamat' => $alamat ,
	'jenis_kelamin' => $jenis_kelamin ,
	'id_kamar' => $id_ruang ,
	'id_dokter' => $id_dokter ,
	'keluhan' => $keluhan ,
	'diagnosa' => $diagnosa ,
	'alat' => $alat ,
	'obat_pre' => $obat_pre ,
	'perkiraan_operasi' => $perkiraan_operasi ,
	'status' => 'belum' ,
	 );

	 // echo "<pre>";
	 // print_r($data);
	 // echo "</pre>";
	 $this->m_pasien->insert('t_pasien',$data);
	//  1[barcode] => KLRSWW0000003
  // 2  [tanggal_input] => 2019-09-16
  // 3  [nama_pasien] => Surtinah
  // 4  [tempat_lahir] => Boyolali
  // 5  [tanggal_lahir] => 1921-05-05
  // 6  [alamat] => Ngelo RT 05 / RW 01
  // 7  [jenis_kelamin] => P
  // 8  [id_ruang] => 3
  // 9  [id_dokter] => 1
  // 10  [keluhan] => Bab Berdarah
  // 11  [diagnosa] => F4
  // 12  [alat] => KOLONOSKOPI
  // 13  [obat_prev] => Bio
  // 14  [perkiraan_operasi] => 2019-09-19
  // 15  [status] => belum
	// 16 . id_pasien
redirect(base_url('t_pasien/'), 'refresh');
}


public function form_edit($id)
	{
		$where = array('id_pasien' => $id,
						);
		$hasil = $this->m_pasien->ambil_dataid($where)->result();

		$data['id_pasien'] = $hasil[0]->id_pasien;
 		// [id_pasien] => 3
		$data['no_rm'] = $hasil[0]->no_rm;
		$data['barcode'] = $hasil[0]->barcode;
    // [barcode] => KLRSWW0000003
		$data['nama_pasien'] = $hasil[0]->nama_pasien;
    // [nama_pasien] => Surtinah
		$data['tempat'] = $hasil[0]->tempat;
    // [tempat] => Boyolali
		$data['tanggal_lahir'] = $hasil[0]->tanggal_lahir;
    // [tanggal_lahir] => 1921-05-05
		$data['alamat'] = $hasil[0]->alamat;
    // [alamat] => Ngelo RT 05 / RW 01
		$ambil_kamar = $this->m_pasien->get_kamar($hasil[0]->id_kamar);
		// echo $ambil_kamar[0]->nama_kelas;
		$value_kelas = "<option value='".$ambil_kamar[0]->id_ruang."' selected>--".$ambil_kamar[0]->nama_kelas."--</option>";
		// echo $ambil_kamar[0]->nama_kelas;
		$data['id_kamar'] = $value_kelas;
    // [id_kamar] => 3
		$ambil_dokter = $this->m_pasien->get_dokter($hasil[0]->id_dokter);
		$value_dokter = "<option value='".$ambil_dokter[0]->id_dokter."' selected>--".$ambil_dokter[0]->nama_dokter."--</option>";
		$data['id_dokter'] = $value_dokter;
    // [id_dokter] => 1
		$data['keluhan'] = $hasil[0]->keluhan;
    // [keluhan] => Bab Berdarah
		$data['diagnosa'] = $hasil[0]->diagnosa;
    // [diagnosa] => F4
		$data['alat'] = $hasil[0]->alat;
    // [alat] => KOLONOSKOPI
		$data['obat_pre'] = $hasil[0]->obat_pre;
    // [obat_pre] => Bio
		$data['tanggal_input'] = $hasil[0]->tanggal_input;
    // [tanggal_input] => 2019-09-16
	    // [hasil] =>
    // [kesimpulan] =>
    // [saran] =>
		$jk ='';
		if($hasil[0]->jenis_kelamin == 'L'){
		$jk = 	"  <option value='".$hasil[0]->jenis_kelamin."' selected>--Laki-laki--</option>";
		}else{
			$jk = 	"  <option value='".$hasil[0]->jenis_kelamin."' selected>--Perempuan--</option>";
		}
		$data['jenis_kelamin'] = $jk;
    // [jenis_kelamin] => P
    // [status] => belum
		$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
    // [perkiraan_operasi] => 2019-09-19
		$data['judul']="Edit data Pasien";
		// $data['barcode'] =	$this->m_pasien->kode_otomatis();
		$data['nama_user'] = $this->session->userdata('nama');
		$this->load->view('page_dashboard',$data);
		$this->cek_menu($this->session->userdata('level'));
			// $this->load->view('left_menu',$data);
		$this->load->view('form_edit',$data);

	}

	public function proses_ubah()
	{
			$id_pasien = $_POST['id_pasien'];
		// 1. [barcode] => KLRSWW0000003
		$barcode = $_POST['barcode'];
		$no_rm = $_POST['no_rm'];
		// 2. [tanggal_input] => 2019-09-16
		$tanggal_input = $_POST['tanggal_input'];
		// 3. [nama_pasien] => Surtinah
			$nama_pasien = $_POST['nama_pasien'];
		// 4. [tempat_lahir] => Boyolali
			$tempat_lahir = $_POST['tempat_lahir'];
		// 5. [tanggal_lahir] => 1921-05-05
			$tanggal_lahir = $_POST['tanggal_lahir'];
		// 6. [alamat] => Ngelo RT 05 / RW 01
			$alamat = $_POST['alamat'];
		// 7. [jenis_kelamin] => P
			$jenis_kelamin = $_POST['jenis_kelamin'];
		// 8. [id_ruang] => 3
			$id_ruang = $_POST['id_ruang'];
		// 9.  [id_dokter] => 1
			$id_dokter = $_POST['id_dokter'];
		// 10. [keluhan] => Bab Berdarah
			$keluhan = $_POST['keluhan'];
		// 11.[diagnosa] => F4
			$diagnosa = $_POST['diagnosa'];
		// 12.[alat] => KOLONOSKOPI
			$alat = $_POST['alat'];
		// 13. [obat_prev] => Bio
			$obat_pre = $_POST['obat_prev'];
		// 14.[perkiraan_operasi] => 2019-09-19
			$perkiraan_operasi = $_POST['perkiraan_operasi'];
		// 15. id_pasien
		//====Otomatis
		// yang belum
		// 16. Status
		// 17. saran
		// 18. hasil
		// 19. kesimpulan

		$data = array('barcode' => $barcode ,
		'tanggal_input' => $tanggal_input ,
		'no_rm' => $no_rm ,
		'nama_pasien' => $nama_pasien ,
		'tempat' => $tempat_lahir ,
		'tanggal_lahir' => $tanggal_lahir ,
		'alamat' => $alamat ,
		'jenis_kelamin' => $jenis_kelamin ,
		'id_kamar' => $id_ruang ,
		'id_dokter' => $id_dokter ,
		'keluhan' => $keluhan ,
		'diagnosa' => $diagnosa ,
		'alat' => $alat ,
		'obat_pre' => $obat_pre ,
		'perkiraan_operasi' => $perkiraan_operasi ,
		'status' => 'belum' ,
		 );

		 $where = array('id_pasien' => $id_pasien,
	 					);
$this->m_pasien->update('t_pasien',$data,$where);

redirect(base_url('t_pasien/'), 'refresh');
	}

public function input_lanjutan($id)
	{
		$where = array('id_pasien' => $id,
						);
		$hasil = $this->m_pasien->ambil_dataid($where)->result();
		$data['id_pasien'] = $hasil[0]->id_pasien;
		$data['no_rm'] = $hasil[0]->no_rm;
		$data['barcode'] = $hasil[0]->barcode;
		$data['nama_pasien'] = $hasil[0]->nama_pasien;
		$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
		$data['judul']="Edit Lanjutan Pasien";
		// $data['barcode'] =	$this->m_pasien->kode_otomatis();
		$data['nama_user'] = $this->session->userdata('nama');
		$this->load->view('page_dashboard',$data);
		$this->cek_menu($this->session->userdata('level'));
			// $this->load->view('left_menu',$data);
		$this->load->view('form_lanjutan',$data);
	}


	public function input_qr($barcode)
		{
			$where = array('barcode' => $barcode,
							);
			$hasil = $this->m_pasien->ambil_dataid($where)->result();
			$data['id_pasien'] = $hasil[0]->id_pasien;
			$data['no_rm'] = $hasil[0]->no_rm;
			$data['barcode'] = $hasil[0]->barcode;
			$data['nama_pasien'] = $hasil[0]->nama_pasien;
			$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
			$data['judul']="Edit Lanjutan Pasien";
			// $data['barcode'] =	$this->m_pasien->kode_otomatis();
			$data['nama_user'] = $this->session->userdata('nama');
			$this->load->view('page_dashboard',$data);
			$this->cek_menu($this->session->userdata('level'));
				// $this->load->view('left_menu',$data);
			$this->load->view('form_lanjutan',$data);
		}

		public function cek_keaslian($barcode)
			{
				$where = array('barcode' => $barcode,
								);
				$hasil = $this->m_pasien->ambil_dataid($where)->result();
				$data['id_pasien'] = $hasil[0]->id_pasien;
				$data['no_rm'] = $hasil[0]->no_rm;
				$data['barcode'] = $hasil[0]->barcode;
				$data['nama_pasien'] = $hasil[0]->nama_pasien;
				$data['status'] = $hasil[0]->status;
				$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
				$data['judul']="Cek Keaslian Dokumen Pasien";
				// $data['barcode'] =	$this->m_pasien->kode_otomatis();
				$data['nama_user'] = $this->session->userdata('nama');
				$this->load->view('page_dashboard',$data);
				$this->cek_menu($this->session->userdata('level'));
					// $this->load->view('left_menu',$data);
				$this->load->view('cek_keaslian',$data);
			}


	//Untuk proses upload foto
	function proses_upload($id){
				$config['max_size'] = '50000000';
				$config['upload_path']   = FCPATH.'/upload-foto/';
				$config['allowed_types'] = 'gif|jpg|png|ico|JPEG|JPG';
				$this->load->library('upload',$config);

				if($this->upload->do_upload('userfile')){
					$token=$this->input->post('token_foto');
					$nama=$this->upload->data('file_name');
					$this->db->insert('t_foto',array('nama_foto'=>$nama,'id_pasien'=>$id,'token'=>$token));
				}


	}


	//Untuk menghapus foto
	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');
		$foto=$this->db->get_where('t_foto',array('token'=>$token));
		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_foto;
			if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('t_foto',array('token'=>$token));

		}


		echo "{}";
	}

	public function proses_lanjutan()
	{

$id_pasien = $_POST['id_pasien'];
$hasil = $_POST['hasil'];
$kesimpulan = $_POST['kesimpulan'];
$saran =$_POST['saran'];
$where = array('id_pasien' => $id_pasien,
			 );
			 $data = array('hasil' =>$hasil ,
			 								'kesimpulan' =>$kesimpulan,
											'saran' => $saran,
											'status' => 'sudah',
		  );

			$this->m_pasien->update('t_pasien',$data,$where);

			redirect(base_url('t_pasien/'), 'refresh');


	}


	public function edit_hasil($id)
	{
		$where = array('id_pasien' => $id,
						);
		$hasil = $this->m_pasien->ambil_dataid($where)->result();
		$data['id_pasien'] = $hasil[0]->id_pasien;
		$data['no_rm'] = $hasil[0]->no_rm;
		$data['barcode'] = $hasil[0]->barcode;
		$data['nama_pasien'] = $hasil[0]->nama_pasien;
		$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
		$data['hasil'] = $hasil[0]->hasil;
		$data['kesimpulan'] = $hasil[0]->kesimpulan;
		$data['saran'] = $hasil[0]->saran;
		$data['judul']="Edit Hasil Lanjutan Pasien";
		// $data['barcode'] =	$this->m_pasien->kode_otomatis();
		 $data['foto']= $this->m_pasien->get_foto($id);

		$data['nama_user'] = $this->session->userdata('nama');
		$this->load->view('page_dashboard',$data);
		$this->cek_menu($this->session->userdata('level'));
			// $this->load->view('left_menu',$data);
		$this->load->view('edit_hasil',$data);

	}

	public function hapus_foto()
	{
		echo $id = $_POST['id_foto'];
 		$data = array('id_foto' => $id,
										);
	 //$hasil = $this->m_pasien->ambil_fotoid($id);

	 $this->m_pasien->hapus('t_foto',$data);



	}


	public function edit_lanjutan()
	{

$id_pasien = $_POST['id_pasien'];
$hasil = $_POST['hasil'];
$kesimpulan = $_POST['kesimpulan'];
$saran =$_POST['saran'];
$where = array('id_pasien' => $id_pasien,
			 );
			 $data = array('hasil' =>$hasil ,
											'kesimpulan' =>$kesimpulan,
											'saran' => $saran,
											'status' => 'sudah',
			);

			$this->m_pasien->update('t_pasien',$data,$where);

			redirect(base_url('t_pasien/edit_hasil/'.$id_pasien), 'refresh');


	}

public function cetak_hasil($id)
{
	$where = array('id_pasien' => $id,
					);

	$hasil = $this->m_pasien->ambilid('t_pasien',$id);

	$data['no_rm'] = $hasil[0]->no_rm;
	$data['nama_pasien'] = $hasil[0]->nama_pasien;
	$data['nama_kelas'] = $hasil[0]->nama_kelas;
	$data['nama_dokter'] = $hasil[0]->nama_dokter;
	$data['umur'] = $hasil[0]->umur;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['jenis_kelamin'] = $hasil[0]->jenis_kelamin;
	$data['alamat'] = $hasil[0]->alamat;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['diagnosa'] = $hasil[0]->diagnosa;
	$data['alat'] = $hasil[0]->alat;
	$data['obat_pre'] = $hasil[0]->obat_pre;
	$data['barcode'] = $hasil[0]->barcode;
	$data['hasil'] = $hasil[0]->hasil;
	$data['kesimpulan'] = $hasil[0]->kesimpulan;
	$data['saran'] = $hasil[0]->saran;
 $data['foto']= $this->m_pasien->get_foto($id);
	$this->load->view('cetak_hasil',$data);
}

public function cetak_assesment($id)
{
	$where = array('id_pasien' => $id,
					);

	$hasil = $this->m_pasien->ambilid('t_pasien',$id);

	$data['no_rm'] = $hasil[0]->no_rm;
	$data['nama_pasien'] = $hasil[0]->nama_pasien;
	$data['nama_kelas'] = $hasil[0]->nama_kelas;
	$data['nama_dokter'] = $hasil[0]->nama_dokter;
	$data['umur'] = $hasil[0]->umur;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['jenis_kelamin'] = $hasil[0]->jenis_kelamin;
	$data['alamat'] = $hasil[0]->alamat;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['diagnosa'] = $hasil[0]->diagnosa;
	$data['alat'] = $hasil[0]->alat;
	$data['obat_pre'] = $hasil[0]->obat_pre;
	$data['barcode'] = $hasil[0]->barcode;
	$data['hasil'] = $hasil[0]->hasil;
	$data['kesimpulan'] = $hasil[0]->kesimpulan;
	$data['saran'] = $hasil[0]->saran;
	$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
  $data['foto']= $this->m_pasien->get_foto($id);
	$this->load->view('cetak_assesment',$data);
}

public function cetak_persiapan($id)
{
	$where = array('id_pasien' => $id,
					);

	$hasil = $this->m_pasien->ambilid('t_pasien',$id);

	$data['no_rm'] = $hasil[0]->no_rm;
	$data['nama_pasien'] = $hasil[0]->nama_pasien;
	$data['nama_kelas'] = $hasil[0]->nama_kelas;
	$data['nama_dokter'] = $hasil[0]->nama_dokter;
	$data['umur'] = $hasil[0]->umur;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['jenis_kelamin'] = $hasil[0]->jenis_kelamin;
	$data['alamat'] = $hasil[0]->alamat;
	$data['keluhan'] = $hasil[0]->keluhan;
	$data['diagnosa'] = $hasil[0]->diagnosa;
	$data['alat'] = $hasil[0]->alat;
	$data['obat_pre'] = $hasil[0]->obat_pre;
	$data['barcode'] = $hasil[0]->barcode;
	$data['hasil'] = $hasil[0]->hasil;
	$data['kesimpulan'] = $hasil[0]->kesimpulan;
	$data['saran'] = $hasil[0]->saran;
	$data['perkiraan_operasi'] = $hasil[0]->perkiraan_operasi;
  $data['foto']= $this->m_pasien->get_foto($id);
	$this->load->view('cetak_persiapan',$data);
}


public function hariini()
	{

		$data['judul']="Jadwal Operasi Hari ini";
		$data['nama_user'] = $this->session->userdata('nama');
		 $this->load->view('page_dashboard',$data);
			$this->cek_menu($this->session->userdata('level'));
			// $this->load->view('left_menu',$data);
			 $this->load->view('hariini',$data);

	}

	function data_hariini(){
			 $data=$this->m_pasien->hariini('t_pasien');
			 echo json_encode($data);
	 }


	 public function bulanini()
	 	{

	 		$data['judul']="Jadwal Operasi Bulan ini";
	 		$data['nama_user'] = $this->session->userdata('nama');
	 		 $this->load->view('page_dashboard',$data);
	 			$this->cek_menu($this->session->userdata('level'));
	 			// $this->load->view('left_menu',$data);
	 			 $this->load->view('bulanini',$data);

	 	}

	 	function data_bulanini(){
	 			 $data=$this->m_pasien->bulanini('t_pasien');
	 			 echo json_encode($data);
	 	 }

		 public function belum_input()
			{

				$data['judul']="Operasi Belum Terinput";
				$data['nama_user'] = $this->session->userdata('nama');
				 $this->load->view('page_dashboard',$data);
					$this->cek_menu($this->session->userdata('level'));
					// $this->load->view('left_menu',$data);
					 $this->load->view('belum_input',$data);

			}

			function data_beluminput(){
					 $data=$this->m_pasien->belum_input('t_pasien');
					 echo json_encode($data);
			 }

			 public function semua()
				{

					$data['judul']="Semua Data Operasi";
					$data['nama_user'] = $this->session->userdata('nama');
					 $this->load->view('page_dashboard',$data);
						$this->cek_menu($this->session->userdata('level'));
						// $this->load->view('left_menu',$data);
						 $this->load->view('semua',$data);

				}

				function data_semua(){
						 $data=$this->m_pasien->semua('t_pasien');
						 echo json_encode($data);
				 }

				 public function cetak_persiapan_kosongan()
				 {
				 	$this->load->view('cetak_persiapan_kosongan');
				 }
}
