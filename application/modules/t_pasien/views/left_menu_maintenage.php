<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Sisman<sup>Inv</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Master
  </div> -->

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-wrench"></i>
      <span>Master Pengguna</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Pengguna:</h6>
        <a class="collapse-item" href="buttons.html">Master User</a>
        <a class="collapse-item" href="http://localhost/phpmyadmin/db_export.php?db=invertory_barang">Master Backup</a>
      </div>
    </div>
  </li> -->

  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

        <i class="fas fa-fw fa-cog"></i>
      <span>Master Data</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Data:</h6>
        <a class="collapse-item" href="<?php echo base_url('kategory'); ?>">Master Kategory</a>
        <a class="collapse-item" href="<?php echo base_url('maintenage'); ?>">Master Maintenage</a>
        <a class="collapse-item" href="<?php echo base_url('ruang'); ?>">Master Ruang</a>
        <a class="collapse-item" href="<?php echo base_url('merk'); ?>">Master Brand</a>
      </div>
    </div>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Transaksi
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Invertory</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Barang Invertory:</h6>
        <a class="collapse-item" href="<?php echo base_url('t_barang/tambah') ?>"><i class="fa fa-plus"></i> Tambah Invertory</a>
        <a class="collapse-item" href="<?php echo base_url('t_barang') ?>">  <i class="fas fa-fw fa-folder"></i> List Invertory</a>
        <a class="collapse-item" href="<?php echo base_url('t_barang/laporan') ?>"> <i class="fas fa-fw fa-eye"></i> Pencarian & Laporan</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Menu Lain:</h6>
        <a class="collapse-item" href="<?php echo base_url('t_barang/kesehatan') ?>" > <i class="fa fa-university"></i>  Kesehatan Invertory</a>
        <a class="collapse-item" href="<?php echo base_url('t_barang/keuangan') ?>" > <i class="fa fa-exclamation-triangle"></i> Keuangan Invertory</a>
      </div>
    </div>
  </li>
 -->


    <!-- Heading -->
    <div class="sidebar-heading">
      Maintenage
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#maintenage" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Maintenage</span>
      </a>
      <div id="maintenage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Maintenage Invertory:</h6>
          <a class="collapse-item" href="<?php echo base_url('t_maintenage/barcode') ?>"><i class="fa fa-barcode"></i> Pencarian Barcode</a>
          <a class="collapse-item" href="<?php echo base_url('t_maintenage/manual') ?>">  <i class="fas fa-fw fa-folder"></i> Pencarian Manual</a>

        </div>
      </div>
    </li>
  <!-- Nav Item - Charts -->
  <!-- <li class="nav-item">
    <a class="nav-link"href="<?php echo base_url('diagram') ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Diagram</span></a>
  </li> -->

  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
