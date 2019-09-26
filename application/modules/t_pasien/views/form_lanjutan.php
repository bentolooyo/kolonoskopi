<!-- Content Wrapper -->
<style type="text/css">

body{
	background-color: #E8E9EC;
}

.dropzone {
	margin-top: 100px;
	border: 2px dashed #0087F7;
}

</style>
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama_user ?></span>
            <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/gambar/logo.jpg">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">

  </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>

        <div class="card-body">
<form  action="<?php echo base_url('t_pasien/proses_lanjutan') ?>" method="post">
          <table class="table">
            <tr>
              <td>Barcode </td>
              <td> <input type="text" class="form-control"  name="barcode" value="<?php echo $barcode; ?>" placeholder="Barcode" readonly>
                 <input type="hidden" class="form-control"  name="id_pasien" value="<?php echo $id_pasien; ?>" placeholder="Barcode" readonly>
              </td>
            </tr>
            <tr>
              <td>Perkiraan Operasi </td>
              <td> <input type="text" class="form-control"  name="tanggal_input" value="<?php echo $perkiraan_operasi; ?>" placeholder="Barcode" readonly>
              </td>
            </tr>
            <tr>
              <td>No RM </td>
              <td> <input type="text" class="form-control"  name="no_rm" value="<?php echo $no_rm; ?>" readonly >
              </td>
            </tr>
            <tr>
              <td>Nama Pasien </td>
              <td> <input type="text" class="form-control"  name="nama_pasien" value="<?php echo $nama_pasien ?>" placeholder="Masukan Nama Pasien" readonly>
              </td>
            </tr>

            <tr>
              <td>Hasil </td>
              <td>
                <textarea name="hasil" class="form-control" rows="10" placeholder="Masukan Data Keterangan Dan unggah Data tabel ke google drive Paste di halaman ini....."></textarea>
                <i>Ket. hasil dari tindakan dokter yang sudah di lakukan.</i>
              </td>
            </tr>

            <tr>
              <td>Kesimpulan </td>
              <td>
                <textarea name="kesimpulan" class="form-control" rows="10" placeholder="Masukan Data Keterangan Dan unggah Data tabel ke google drive Paste di halaman ini....."></textarea>
                <i>Kesimpulan dari tindakan dokter yang sudah di lakukan.</i>
              </td>
            </tr>
            <tr>
              <td>Saran </td>
              <td>
                <textarea name="saran" class="form-control" rows="10" placeholder="Masukan Data Keterangan Dan unggah Data tabel ke google drive Paste di halaman ini....."></textarea>
                <i>Saran Apabila di perlukan tindakan lanjutan.</i></td>
            </tr>

            <tr>
              <td>Upload Foto </td>
              <td>

                <div class="dropzone">

                  <div class="dz-message">
                   <h3> Klik atau Drop gambar disini</h3>
                  </div>

                </div>
                <i> <b>Perhatian:</b> Upload Gambar hanya dapat dilakukan satu kali dan dapat di hapus saat itu juga, harap di pilih dan gunakan dengan bijak</i></td>
            </tr>
            <tr align='center'>
              <td colspan="2">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan Lanjutan">
            <!-- <a href="#" id="btn-tambah" onclick="tambah_data();"class="btn btn-primary"><span class="fa fa-save"></span> Save</a> -->

            <a href="<?php echo base_url('t_pasien/') ?>" data-dismiss="modal" class="btn btn-danger"><span class="fa fa-times"></span> Cancel</a>
              </td>
              </tr>
          </table>

          </form>
      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy;Benny Danang Kurniawan 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
    </div>
  </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/basic.min.css') ?>">
<script type="text/javascript" src="<?php echo base_url('assets/dropzone.min.js') ?>"></script>

<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>


<!-- =========================================================FORM =================================================================== -->

<div class="modal form" id="form" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h3>Master Ruang </h3>
    </div>
    <a id="pesan" align="center"></a>

    <table class="table">
      <tr>
        <td>Nama Ruang/ Kelas </td>
        <td> <input type="text" class="form-control"  name="nama_kelas" placeholder="Nama Kelas / Ruang Asal">
          <input type="hidden" class="form-control"  name="id" placeholder="Nama Pengguna">
        </td>
      </tr>

      <tr align='center'>
        <td colspan="2">
      <a href="#" id="btn-tambah" onclick="tambah_data();"class="btn btn-primary"><span class="fa fa-save"></span> Save</a>
        <a href="#" id="btn-ubah" onclick="ubah_data();"class="btn btn-primary"><span class="fa fa-eye"></span> Ubah Data</a>
      <a href="#" data-dismiss="modal" class="btn btn-danger"><span class="fa fa-times"></span> Cancel</a>
        </td>
        </tr>
    </table>
  </div>

</div>
</div>

<!-- =========================================================FORM =================================================================== -->

<!-- =========================================================FORM Detail =================================================================== -->

<div class="modal fade" id="form_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><span class="fa fa-eye"></span> Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        						<label for="name">Nama Dokter</label>
        						<h4 id="nama"></h4>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- =========================================================FORM =================================================================== -->


<script type="text/javascript">
var id = "<?php echo $id_pasien ?>";
// console.log(id);
tinymce.init({ selector:'textarea', menubar:'', theme: 'silver'});

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('t_pasien/proses_upload/') ?>"+id,
maxFilesize: 20,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('t_pasien/remove_foto') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
			console.log("Foto terhapus");
		},
		error: function(){
			console.log("Error");

		}
	});
});

</script>
