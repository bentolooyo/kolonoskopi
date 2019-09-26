<!-- Content Wrapper -->
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
        <!-- <h1 class="h3 mb-0 text-gray-800"><?php echo $judul ?></h1> -->
        <!-- <a href="http://localho st/phpmyadmin/db_export.php?db=invertory_barang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Backup Database</a> -->
        <!-- <a href="#form" data-toggle="modal" onclick="submit('tambah')" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Ruang</a> -->

<a href="<?php echo base_url('t_pasien/'); ?>"  class="btn btn-sm btn-info shadow-sm"  >Kembali</a>
  </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>

        <div class="card-body">
<form  action="<?php echo base_url('t_pasien/proses_daftar') ?>" method="post">


          <table class="table">
            <tr>
              <td>Barcode </td>
              <td> <input type="text" class="form-control"  name="barcode" value="<?php echo $barcode; ?>" placeholder="Barcode" readonly>
              </td>
            </tr>
            <tr>
              <td>Reg Date </td>
              <td> <input type="text" class="form-control"  name="tanggal_input" value="<?php echo date('Y-m-d'); ?>" placeholder="Barcode" readonly>
              </td>
            </tr>
            <tr>
              <td>No RM </td>
              <td> <input type="text" class="form-control"  name="no_rm"  placeholder="Nomor Rekam Medis" >
              </td>
            </tr>
            <tr>
              <td>Nama Pasien </td>
              <td> <input type="text" class="form-control"  name="nama_pasien" placeholder="Masukan Nama Pasien" >
              </td>
            </tr>
            <tr>
              <td>Tempat Lahir </td>
              <td> <input type="text" class="form-control"  name="tempat_lahir" placeholder="Tempat lahir ex. Boyolali" >
              </td>
            </tr>

            <tr>
              <td>Tanggal Lahir </td>
              <td> <input type="date" class="form-control"  name="tanggal_lahir" placeholder="Tanggal Lahir" >
              </td>
            </tr>
            <tr>
              <td>Alamat </td>
              <td> <input type="text" class="form-control"  name="alamat" placeholder="Masukan Alamat" >
                <i>Misalnya: Boyolali RT XX/RW XX</i>
              </td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>   <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
              <option value='L'>Laki-laki</option>
              <option value='P'>Perempuan</option>

                </select>
<i>Pilih Jenis Kelamin 'Laki-laki' dan 'Perempuan'</i>
              </td>
            </tr>
            <tr>
              <td>Asal Kelas/ Kamar </td>
              <td>   <select class="form-control" id="id_ruang" name="id_ruang">
              <option value=0>--Pilih Asal Kelas/Kamar--</option>
                </select>
                <i>Misalnya: Rawat Jalan, Ruang Dahlia</i>
              </td>
            </tr>

            <tr>
              <td>Dari Dokter</td>
              <td>   <select class="form-control" id="id_dokter" name="id_dokter">
              <option value=0>--Pilih Asal Dokter--</option>
                </select>

              </td>
            </tr>
            <tr>

              <td>Keluhan Pasien</td>
              <td> <input type="text" class="form-control"  name="keluhan" placeholder="Keluhan Pasien" >
                <i>Keluhan yang di derita pasien</i>
              </td>
            </tr>
            <tr>
              <td>Diagnosa </td>
              <td> <input type="text" class="form-control"  name="diagnosa" placeholder="Diagnosa pasien" >
              </td>
            </tr>
            <tr>
              <td>Alat </td>
              <td> <input type="text" class="form-control"  name="alat" placeholder="Alat." >
                <i>Perkiraan alat tindakan operasi dilaksanakan.</i>
              </td>
            </tr>
            <tr>
              <tr>
                <td>Obat Prev </td>
                <td> <input type="text" class="form-control"  name="obat_prev" placeholder="Penggunaan Obat Pre" >

                </td>
              </tr>
              <td>Perkiraan Operasi </td>
              <td> <input type="date" class="form-control"  name="perkiraan_operasi" placeholder="Perkiraan Operasi" >
                <i>Perkiraan Tindakan Operasi dilaksanakan.</i>
              </td>
            </tr>
            <tr align='center'>
              <td colspan="2">
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
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

<!-- Bootstrap core JavaScript-->
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

tampil_ruang();
function tampil_ruang(){
var awal='<option value=0>--Pilih Ruang/Asal--</option>';
         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('t_pasien/data_ruang'); ?>',
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 for(i=0; i<data.length; i++){

                   no ++;
                     html += '<option value='+data[i].id_ruang+'>'+data[i].nama_kelas+'</option>';
                 }
                 $('#id_ruang').html(awal+html);
             }

         });
       }


       tampil_dokter();
       function tampil_dokter(){
       var awal='<option value=0>--Pilih Asal Dokter--</option>';
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('t_pasien/data_dokter'); ?>',
                    async : false,
                    dataType : 'json',
                    success : function(data){

                        var html = '';
                        var i;
                        var no =0;
                        for(i=0; i<data.length; i++){

                          no ++;
                            html += '<option value='+data[i].id_dokter+'>'+data[i].nama_dokter+'</option>';
                        }
                        $('#id_dokter').html(awal+html);
                    }

                });
              }

</script>
