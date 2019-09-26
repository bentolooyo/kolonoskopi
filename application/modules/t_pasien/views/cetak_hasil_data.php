<!-- Custom fonts for this template-->
<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<!-- <link href="<?php echo base_url() ?>assets/css/print.css" rel="stylesheet" type="text/css" media="print"> -->
<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container">
<br>
<table width="100%" >
<tr>
  <td width="20%" align="center"> <img src="<?php echo base_url('assets/logo.png') ?>" width="100" height="150"> </td>
  <td width="80%">

    <h3>PEMERINTAH KABUPATEN BOYOLALI</h3>
<h3> <b>RUMAH SAKIT UMUM DAERAH WARAS WIRIS</b> </h3>
<h5>Jl. Karanggede - Gemolong Km.13 Kec. Andong Kab. Boyolali 57384</h5>
<i> <b>Telp.</b>  0271 2933001/ 0271 2933002 <b>Email:</b> rsudwaraswiris@gmail.com </i>

  </td>

</tr>
<tr>
  <td colspan="2" >
    <hr size="10">
  </td>
</tr>
<tr>
  <td colspan="2" class="bg-dark text-white"  align="center">
    <b> REKAPITULASI PASIEN </b>
  </td>
</tr>
<tr>
  <td colspan="2">
Terbit Tanggal : <?php echo date('d/m/y h:i') ?> <br>
Rekap Tanggal : <b><?php echo $tanggal_awal ?></b>  Sampai dengan <b><?php echo $tanggal_akhir ?></b>
<br>
<br><br>

<table class="table">
<tr>
  <td> <b>No</b> </td>
  <td> <b> No RM</b></td>
  <td> <b>Nama Pasien</b> </td>
  <td> <b>TTL / Umur</b></td>
  <td> <b>Perkiraan Operasi</b> </td>
  <td> <b> Status</b></td>
</tr>
<?php
$no =0;
 foreach ($pasien as $p): $no++; ?>
  <tr>
    <td> <?php echo $no ?> </td>
    <td> <?php echo $p->no_rm ?></td>
    <td> <?php echo $p->nama_pasien ?></td>


  <td> <?php echo $p->tempat ?> <?php echo $p->tanggal_lahir ?> /  <?php echo $p->umur ?>Th</td>
    <td> <?php echo $p->perkiraan_operasi ?></td>
    <td> <?php echo $p->status ?> KOLONOSKOPI</td>
  </tr>
<?php endforeach; ?>
</table>
  </td>
</tr>
</table>
</div>
<script type="text/javascript">

  window.print();

</script>
