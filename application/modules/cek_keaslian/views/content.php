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
    </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>
        <div class="card-body">

<div class="container" align="center">

  <hr>
  <canvas></canvas>
  <hr>
  <select></select>
  <hr>
  <ul></ul>

</div>
          <script type="text/javascript" src="<?php echo base_url('assets/') ?>js/qrcodelib.js"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/') ?>js/webcodecamjs.js"></script>
          <script type="text/javascript">
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
              var arg = {
                  resultFunction: function(result) {
                 var hasil = result.code;
                 window.location.href= '<?php echo base_url('t_pasien/input_qr/'); ?>'+hasil;
                    // alert(hasil);
                  }
              };
              var decoder = new WebCodeCamJS("canvas").buildSelectMenu('select', 'environment|back').init(arg).play();
              /*  Without visible select menu
                  var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
              */
              document.querySelector('select').addEventListener('change', function(){
                decoder.stop().play();
              });
          </script>


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




<script type="text/javascript">

tampil_data();
//================================================== MENAMPILKAN DATA ==============================================================
function tampil_data(){

         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('m_dokter/data'); ?>',
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 for(i=0; i<data.length; i++){

                   no ++;
                     html += '<tr>'+
                             '<td>'+no+'</td>'+
                             '<td ondblclick="detail('+data[i].id_dokter+')">'+data[i].nama_dokter+'</td>'+
                             '<td style="text-align:right;">'+
                                   '<a href="#form" data-toggle="modal" class="btn btn-warning" onclick="submit('+data[i].id_dokter+');"><i class="far fa-edit"></i></a>'+' '+
                                   '<a href="#" class="btn btn-danger btn-xs" onclick="hapus('+data[i].id_dokter+');" ><i class="fa fa-trash" aria-hidden="true"></i></a>'+
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
          url : '<?php echo base_url('m_dokter/ambilid'); ?>',
          success:function(hasil){
            //convert JSON parse

          obj = JSON.parse(hasil);
          console.log(hasil);
            $("#nama").html(obj[0]['nama_dokter']);

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
            url : '<?php echo base_url('m_dokter/ambilid'); ?>',
            success:function(hasil){
              //convert JSON parse

            obj = JSON.parse(hasil);
              $("input[name='id']").val(obj[0]['id_dokter']);
              $("input[name='nama_dokter']").val(obj[0]['nama_dokter']);
              // $("input[name='username']").val(obj[0]['username']);
              // $("input[name='password']").val(obj[0]['password']);
              // $("input[name='repassword']").val(obj[0]['password']);
              // $("#level").val(obj[0]['level']).change();
              // $('#pesan').html('Ketik Ulang Password Anda!');
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
  var nama_dokter =$("input[name='nama_dokter']").val();


      $.ajax({
      type:'POST',
      data: 'nama_dokter='+nama_dokter,
      url: '<?php echo base_url('m_dokter/proses_tambah') ?>',
      dataType:'json',
      success:function(hasil){

          if (hasil.pesan == '') {
          $('#form').modal('hide');
          tampil_data();
          //kosongkan om
          $("input[name='nama_dokter']").val('');
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
  var nama_dokter =$("input[name='nama_dokter']").val();

  var id =$("input[name='id']").val();
  $.ajax({
  type:'POST',
  data: 'id='+id+'&nama_dokter='+nama_dokter,
  url: '<?php echo base_url('m_dokter/proses_ubah') ?>',
  dataType:'json',
  success:function(hasil){
 console.log(hasil);
      if (hasil.pesan == '') {
      $('#form').modal('hide');
      tampil_data();
      //kosongkan om
      $("input[name='id']").val('');
      $("input[name='nama_dokter']").val('');

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
     url : '<?php echo base_url('m_dokter/hapus'); ?>',
     success:function(hasil){
       //convert JSON parse
  tampil_data();
     }
   });
 }
}
</script>
