<!-- Custom fonts for this template-->
<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<!-- <link href="<?php echo base_url() ?>assets/css/print.css" rel="stylesheet" type="text/css" media="print"> -->
<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container">
<br>
<table width="100%">
<tr>
  <td width="15%" align="center"> <img src="<?php echo base_url('assets/logo.png') ?>" width="100" height="150"> </td>
  <td width="70%">

    <h3>PEMERINTAH KABUPATEN BOYOLALI</h3>
<h3> <b>RUMAH SAKIT UMUM DAERAH WARAS WIRIS</b> </h3>
<h5>Jl. Karanggede - Gemolong Km.13 Kec. Andong Kab. Boyolali 57384</h5>
<i> <b>Telp.</b>  0271 2933001/ 0271 2933002 <b>Email:</b> rsudwaraswiris@gmail.com </i>

  </td>
  <td width="15%" align="center">
<img src="<?php echo base_url('assets/qrbarcode/') ?><?php echo $barcode?>.png" width="140" height="140">
  </td>
</tr>
<tr>
  <td colspan="3" >
    <hr size="10">
  </td>
</tr>
<tr>
  <td colspan="3" class="bg-dark text-white"  align="center">
    <b> DATA PASIEN </b>
  </td>
</tr>
<tr>
  <td colspan="3" >
    <hr size="10">
  </td>
</tr>
<tr>
  <td colspan="3">
    <table  width="100%">
      <tr>
        <td width="25%">No Rm</td>
        <td width="25%">: <b><?php echo $no_rm; ?></b> </td>
        <td width="25%">Nama Kelas/ Ruang/ Asal</td>
        <td width="25%">: <b><?php echo $nama_kelas; ?></b> </td>
      </tr>

      <tr>
        <td>Nama Pasien</td>
        <td> : <b><?php echo $nama_pasien; ?></b></td>
        <td>Dari Dokter</td>
        <td>: <b><?php echo $nama_dokter; ?></b> </td>
      </tr>
      <tr>
        <td>Umur / Jenis Kelamin</td>
        <td> : <b><?php echo $umur; ?> Tahun / <?php echo $jenis_kelamin ?> </b></td>
        <td>Keluhan</td>
        <td>: <b><?php echo $keluhan; ?></b> </td>
      </tr>
      <tr>
        <td rowspan="3">Alamat</td>
        <td rowspan="3" > : <b><?php echo $alamat; ?>  </b></td>
        <td>diagnosa</td>
        <td>: <b><?php echo $diagnosa; ?></b> </td>
      </tr>
      <tr>

        <td>Alat</td>
        <td>: <b><?php echo $alat; ?></b> </td>
      </tr>
      <tr>

        <td>Obat Premedikasi</td>
        <td>: <b><?php echo $obat_pre; ?></b> </td>
      </tr>
    </table>

  </td>
</tr>
<tr>
  <td colspan="3" >
    <hr size="10">
  </td>
</tr>
<tr>
  <td colspan="3" class="bg-dark text-white"  align="center">
    <b> LEMBAR ASSESMENT </b>
  </td>
</tr>
<tr>
  <td colspan="3" >
    <hr size="10">
  </td>
</tr>
<tr>
  <td colspan="3">
<p align =" justify">&emsp; Yang bertanda tangan di bawah ini / yang mewakili saya yang bernama <b> <?php echo $nama_pasien ?></b> , umur <b><?php echo $umur; ?> </b> Tahun
, jenis kelamin <b><?php echo $jenis_kelamin; ?></b>  alamat <b><?php echo $alamat ?></b>  dengan ini menyatakan persetujuan untuk di lakukan tindakan "KOLONOSKOPI" terhadap saya
 yang akan di laksanakan pada tanggal <b><?php echo $perkiraan_operasi; ?></b>. Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah di jelaskan seperti diatas kepada Saya
termasuk resiko dan komplikasi yang mungkin timbul.
</p>
<p> Atau saya yang mewakili sebagai penanggung jawab:</p>
<p>Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:................................................................................................
<br>
Hubungan Pasien &emsp;&emsp;:................................................................................................
<br>
Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; :................................................................................................
<br>
Tempat Tanggal Lahir :................................................................................................
</p>
<p align =" justify">
&emsp;  Saya juga menyadari bahwa oleh karena itu ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan Tindakan
 kedokteran bukanlah keniscayaan, melainkan sangat bergantung kepada izin Tuhan Yang Maha Esa.
</p>
<br><br><br>
<p align="right">Boyolali.....................................................</p>
<br>
<table width = "100%">
<tr  align="center">
  <td width="30%">
Yang menyatakan,
<br>
<br>
<br>
(........................................)
  </td>
  <td width="30%">
Saksi,
<br>
<br>
<br>
(........................................)
  </td>
  <td width="30%">
Saksi,
<br>
<br>
<br>
(........................................)
  </td>
</tr>
</table>
  </td>
</tr>
</table>
</div>
<script type="text/javascript">

  window.print();

</script>
