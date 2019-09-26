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

        <a href="<?php echo base_url('t_pasien/form_tambah') ?>"  class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pasien</a>
<input type="date" name="tanggal_awal" value="<?php echo date('Y-m-d') ?>"> Sampai <input type="date" name="tanggal_akhir" value="<?php echo date('Y-m-d') ?>">
<a href="#"  class="btn btn-sm btn-info shadow-sm"  onclick="tampil_data();"> <span class="fa fa-cog" ></span> Cari Data</a>
<a href="#"  class="btn btn-sm btn-danger shadow-sm"  onclick="cetak_data();"><span class="fa fa-print" ></span> Cetak Data Per-tanggal Input</a>
  </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>

        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>No RM</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir / Usia</th>
                  <th>Nama Dokter</th>
                  <th>Perkiraan Operasi</th>
                  <th>Nama Asal Ruang</th>
                  <th>Tanggal Input</th>
                  <th>Status</th>
                  <th>Tools</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NO</th>
                  <th>No RM</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir / Usia</th>
                  <th>Nama Dokter</th>
                  <th>Perkiraan Operasi</th>
                  <th>Nama Asal Ruang</th>
                  <th>Tanggal Input</th>
                  <th>Status</th>
                  <th>Tools</th>
                </tr>
              </tfoot>
              <tbody id="tampil_data">
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
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
  <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><span class="fa fa-eye"></span> Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        						<label for="name">Nama Pasien</label>
        						<h4 id="nama"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Barcode</label>
                    <h4 id="barcode"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Tempat, Tanggal Lahir</label>
                    <h4 id="tempat_lahir"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Asal Ruang/kelas</label>
                    <h4 id="nama_ruang"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Nama Dokter Asal</label>
                    <h4 id="nama_dokter"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Perkiraan Operasi</label>
                    <h4 id="perkiraan_operasi"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Keluhan</label>
                    <h4 id="keluhan"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Diagnosa</label>
                    <h4 id="diagnosa"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Alat</label>
                    <h4 id="alat"></h4>
        </div>
        <div class="form-group">
                    <label for="name">Obat Pre</label>
                    <h4 id="obat_pre"></h4>
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

function cetak_data() {
  var tanggal_awal =$("input[name='tanggal_awal']").val();
  var tanggal_akhir =$("input[name='tanggal_akhir']").val();

  window.location.href ='<?php echo base_url('t_pasien/cetak_data/'); ?>'+tanggal_awal+'/'+tanggal_akhir ,'_blank';
}


tampil_data();
//================================================== MENAMPILKAN DATA ==============================================================
function tampil_data(){
  var tanggal_awal =$("input[name='tanggal_awal']").val();
  var tanggal_akhir =$("input[name='tanggal_akhir']").val();

         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('t_pasien/data/'); ?>'+tanggal_awal+'/'+tanggal_akhir,
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 var link ='';
                 for(i=0; i<data.length; i++){
                   if (data[i].status == "sudah") {
                   link ='<a href="<?php echo base_url('t_pasien/edit_hasil/') ?>'+data[i].id_pasien+'"  class="btn btn-sm btn-warning shadow-sm"  ><i class="far fa-edit"></i>Edit Hasil Tindakan</a><a href="<?php echo base_url('t_pasien/cetak_hasil/') ?>'+data[i].id_pasien+'" target="_blank"  class="btn btn-sm btn-primary shadow-sm" ><span class="fa fa-print"></span> Cetak Hasil Data</a>'
                   }else {
                   link ='<a href="<?php echo base_url('t_pasien/input_lanjutan/') ?>'+data[i].id_pasien+'"  class="btn btn-sm btn-danger shadow-sm"  ><i class="far fa-edit"></i> Input Hasil KOLONOSKOPI</a><a href="<?php echo base_url('t_pasien/cetak_persiapan/') ?>'+data[i].id_pasien+'" target="_blank"  class="btn btn-sm btn-secondary shadow-sm" > <span class="fa fa-print"></span> Cetak Persiapan KOLONOSKOPI</a><a href="<?php echo base_url('t_pasien/cetak_assesment/') ?>'+data[i].id_pasien+'" target="_blank"  class="btn btn-sm btn-info shadow-sm" > <span class="fa fa-print"></span> Cetak Pengajuan Assesment</a>'
                   }
                   no ++;
                     html += '<tr>'+
                             '<td>'+no+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].no_rm+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].nama_pasien+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].tanggal_lahir+'/'+data[i].umur+'tahun</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].nama_dokter+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].perkiraan_operasi+'</td>'+
                              '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].nama_kelas+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+data[i].tanggal_input+'</td>'+
                             '<td ondblclick="detail('+data[i].id_pasien+')">'+link+'</td>'+
                             '<td style="text-align:right;">'+
                                   '<a href="<?php echo base_url('t_pasien/form_edit/');?>'+data[i].id_pasien+'"  class="btn btn-warning"><i class="far fa-edit"></i></a>'+' '+
                                   '<a href="#" class="btn btn-danger btn-xs" onclick="hapus('+data[i].id_pasien+');" ><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                                 '</td>'+
                             '</tr>';
                 }
                 $('#tampil_data').html(html);
             }

         });
       }
//================================================== AKHIR MENAMPILKAN DATA ==============================================================

//================================================== DETAIL DATA ==================================================================
      function detail(id) {
        console.log(id);
        $.ajax({
          type : 'POST',
          data : 'id='+id,
          url : '<?php echo base_url('t_pasien/ambilid'); ?>',
          success:function(hasil){
            //convert JSON parse

          obj = JSON.parse(hasil);
          console.log(hasil);
            $("#nama").html(obj[0]['nama_pasien']);
            $("#barcode").html('<img src="<?php echo base_url('assets/qrbarcode/') ?>'+obj[0]['barcode']+'.png" width="100" height="100">');
            $("#tempat_lahir").html(obj[0]['tempat']+','+obj[0]['tanggal_lahir']+'/ '+obj[0]['umur']+'Tahun');
            $("#nama_ruang").html(obj[0]['nama_kelas']);
            $("#nama_dokter").html(obj[0]['nama_dokter']);
            $("#perkiraan_operasi").html(obj[0]['perkiraan_operasi']);
            $("#diagnosa").html(obj[0]['diagnosa']);
            $("#keluhan").html(obj[0]['keluhan']);
            $("#alat").html(obj[0]['alat']);
            $("#obat_pre").html(obj[0]['obat_pre']);
             $("#form_detail").modal('show');
          }

        });

      }
//================================================== AKHIR DETAIL DATA ==============================================================
      function submit(x) {
        if (x=='tambah') {
          $('#btn-tambah').show();
          $('#btn-ubah').hide();
            } else {
          $('#btn-tambah').hide();
          $('#btn-ubah').show();

          $.ajax({
            type : 'POST',
            data : 'id='+x,
            url : '<?php echo base_url('t_pasien/ambilid'); ?>',
            success:function(hasil){
              //convert JSON parse

            obj = JSON.parse(hasil);

              $("input[name='id']").val(obj[0]['id_ruang']);
              $("input[name='nama_kelas']").val(obj[0]['nama_pasien']);

            }

          });
        }

      }

//================================================== MENAMPILKAN DATA ================================================================

function cek_password() {
          var password =$("input[name='password']").val();
          var repassword =$("input[name='repassword']").val();

          if(repassword == password){
               $('#pesan').html('<label id="pesan" style="color:green" ><b>Password Cocok! </b></label>')
          }else {
              $('#pesan').html('<label id="pesan" style="color:red" >Password Tidak Sama! </label>')
          }
    }
//===================================================================================================================================


function tambah_data() {
  var nama_kelas =$("input[name='nama_kelas']").val();
console.log(nama_kelas);

      $.ajax({
      type:'POST',
      data: 'nama_kelas='+nama_kelas,
      url: '<?php echo base_url('m_ruang/proses_tambah') ?>',
      dataType:'json',
      success:function(hasil){

          if (hasil.pesan == '') {
          $('#form').modal('hide');
          tampil_data();
          //kosongkan om
          $("input[name='nama_ruang']").val('');
          // $("input[name='username']").val('');
          // $("input[name='password']").val('');
          // $("input[name='repassword']").val('');
          } else {
          $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
          }

      }
      });
}


//===========================================================Ubah Data======================================================================

function ubah_data() {
  var nama_kelas =$("input[name='nama_kelas']").val();
  var id =$("input[name='id']").val();
  $.ajax({
  type:'POST',
  data: 'id='+id+'&nama_kelas='+nama_kelas,
  url: '<?php echo base_url('m_ruang/proses_ubah') ?>',
  dataType:'json',
  success:function(hasil){

      if (hasil.pesan == '') {
      $('#form').modal('hide');
      tampil_data();
      //kosongkan om
      $("input[name='id']").val('');
      $("input[name='nama_kelas']").val('');

      } else {
      $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
      }

  }
  });

}
//=========================================================Akhir Ubah===================================================================

function hapus(id) {
 var tanya =confirm('Apakah anda akan menghapus data ini ?');
 if (tanya) {
   $.ajax({
     type : 'POST',
     data : 'id='+id,
     url : '<?php echo base_url('t_pasien/hapus'); ?>',
     success:function(hasil){
       //convert JSON parse
  tampil_data();
     }
   });
 }
}
</script>
