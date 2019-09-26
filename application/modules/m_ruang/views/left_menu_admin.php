<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
    <div class="sidebar-brand-icon rotate-n-0">
      <i class="fa fa-heartbeat"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIOPKOL<sup>RSWW</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url(); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-wrench"></i>
      <span>Master Pengguna</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Pengguna:</h6>
        <a class="collapse-item"href="<?php echo base_url('user'); ?>">Master User</a>
        <a class="collapse-item" href="http://localhost/phpmyadmin/db_export.php?db=kusuka">Master Backup</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

        <i class="fas fa-fw fa-cog"></i>
      <span>Master Data</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Data:</h6>
        <a class="collapse-item" href="<?php echo base_url('m_dokter'); ?>">Master Dokter</a>
        <a class="collapse-item" href="<?php echo base_url('m_ruang'); ?>">Master Ruang</a>
        <!-- <a class="collapse-item" href="<?php echo base_url('m_kelompok'); ?>">Master Kelompok</a>
        <a class="collapse-item" href="<?php echo base_url('m_komoditas'); ?>">Master Komoditas</a>
          <a class="collapse-item" href="<?php echo base_url('m_kelas_kelompok'); ?>">Master Kelas</a> -->
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Transaksi</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Barang Invertory:</h6>
        <a class="collapse-item" href="<?php echo base_url('t_pasien/form_tambah') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
        <a class="collapse-item" href="<?php echo base_url('t_pasien') ?>">  <i class="fas fa-map-signs"></i> List Data</a>
        <a class="collapse-item" href="<?php echo base_url('t_pasien/hariini/') ?>"> <i class="fa fa-calendar"></i> Jadwal Hari Ini</a>
            <a class="collapse-item" href="<?php echo base_url('t_pasien/bulanini/') ?>"> <i class="fa fa-calendar"></i> Jadwal Bulan Ini</a>
                <a class="collapse-item" href="<?php echo base_url('t_pasien/belum_input/') ?>"> <i class="fa fa-folder"></i> Belum Ter-Input</a>
                <a class="collapse-item" href="<?php echo base_url('t_pasien/semua/') ?>"> <i class="fa fa-folder-open"></i> Seluruh Data</a>
        <div class="collapse-divider"></div>
        <!-- <h6 class="collapse-header">Menu Lain:</h6> -->
        <!-- <a class="collapse-item" href="<?php echo base_url('t_lapor/diagram') ?>" > <i class="fa fa-university"></i>  Diagram</a> -->
        <!-- <a class="collapse-item" href="<?php echo base_url('t_pasien/cetak') ?>" > <i class="fa fa-print"></i> Cetak Data</a> -->
      <!-- </div> -->
    </div>
  </li>



  <!-- <li class="nav-item">
    <a class="nav-link"href="<?php echo base_url('diagram') ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Diagram</span></a>
  </li> -->

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('cek_keaslian/pencarian_cepat/') ?>">
      <i class="fa fa-plug"></i>
      <span>Input Hasil Cepat</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('cek_keaslian/') ?>">
      <i class="fa fa-qrcode"></i>
      <span>Cek Keaslian Dokumen</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
