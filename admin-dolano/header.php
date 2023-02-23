<?php 

  // mulai session
  session_start();
   
  // menghubungkan dengan file koneksi database
  require 'connection/koneksi-database.php';

  // cek cookienya
  if(isset($_COOKIE["idC"]) && isset($_COOKIE["keyC"])) {
    // ambil value cookienya
    $idC   = $_COOKIE["idC"];
    $keyC  = $_COOKIE["keyC"];

    // ambil data admin dari tabel admin
    $ambilAdminC = $conn->query("SELECT * FROM tbl_admin WHERE id_admin = '$idC' ");
    $pecahAdminC = $ambilAdminC->fetch_assoc();

    // cek/verifikasi value keyC dengan username admin pada tabel admin
    if($keyC === hash("sha256", $pecahAdminC["username"])) {
      // jika cocok/sama, set session adminnya
      $_SESSION["admin"] = $pecahAdminC;
    }

  }

  // cek jika belum ada session admin/belum login
  if(!isset($_SESSION["admin"])) {
    // alihkan kembali kehalaman login
    header("Location: login.php");
    exit();
  }

  // ambil pesan yang belum terbaca
  $ambilSubsBaru = $conn->query("SELECT * FROM tbl_subscriber WHERE status_pesan = 'Belum terbaca' ");
  // jumlah total pesan baru
  $jmlSubsBaru = $ambilSubsBaru->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dolano</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="dist/img/favicon-1.png">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Pace Loading -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-primary">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?halaman=dashboard" class="nav-link">Utama</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- jika ada subscriber baru & jika tidak ada -->
        <?php if($jmlSubsBaru > 0) { ?>
        <a class="nav-link" data-toggle="dropdown" href="#" id="btn-bell">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?=$jmlSubsBaru; ?></span>
        </a>
        <?php } else { ?>
        <a class="nav-link disabled" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
        <?php } ?>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Subscriber baru</span>

          <!-- jika total subscriber hanya 1 orang -->
          <?php if($jmlSubsBaru == 1) { ?>

          <div class="dropdown-divider"></div>
          <a href="index.php?halaman=subscriber" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?=$jmlSubsBaru; ?> subscriber baru
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
          <div class="dropdown-divider"></div>

          <!-- jika total subscriber lebih dari 1 orang  -->
          <?php } else if($jmlSubsBaru > 1) { ?>

          <div class="dropdown-divider"></div>
          <a href="index.php?halaman=subscriber" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Ada <?=$jmlSubsBaru; ?> subscriber baru
            <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
          <div class="dropdown-divider"></div>

          <!-- jika tidak ada subscriber -->
          <?php } else { ?>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item disabled">
            <i class="fas fa-exclamation-triangle mr-2"></i> Tidak ada subscriber baru
          </a>

          <?php } ?>

          <div class="dropdown-divider"></div>
          <a href="index.php?halaman=subscriber" class="dropdown-item dropdown-footer">Lihat semua subscriber</a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?halaman=dashboard" class="brand-link">
      <img src="dist/img/others/ALTEL.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dolano</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION["admin"]["nama_lengkap"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php if($_GET['halaman'] == 'dashboard') { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dolano</p>
                </a>    
              </li>
            </ul>
          </li>

          <?php } else { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=dashboard" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dolano</p>
                </a>    
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if($_GET['halaman'] == 'wisata-pegunungan') { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Wisata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="index.php?halaman=wisata-pegunungan" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegunungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-air" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Air</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-religi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah wisata</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'wisata-air') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Wisata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegunungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-air" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Air</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-religi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah wisata</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'wisata-religi') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Wisata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegunungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-air" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Air</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-religi" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah wisata</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'tambah-wisata') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Wisata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegunungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-air" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Air</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-religi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-wisata" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah wisata</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'edit-wisata') { ?>
            <?php 
              $ambilkatWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata WHERE tbl_wisata.id_wisata = '$_GET[id]' ");
              $pecahKatWis = $ambilkatWis->fetch_assoc();
                if($pecahKatWis["kategori_wisata"] == "Pegunungan") {
            ?>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Wisata
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item"> 
                  <a href="index.php?halaman=wisata-pegunungan" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegunungan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-air" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Air</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-religi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Religi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=tambah-wisata" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah wisata</p>
                  </a>
                </li>
              </ul>
            </li>

            <?php } else if($pecahKatWis["kategori_wisata"] == "Air") { ?>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Wisata
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item"> 
                  <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegunungan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-air" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Air</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-religi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Religi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=tambah-wisata" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah wisata</p>
                  </a>
                </li>
              </ul>
            </li>

            <?php } else if($pecahKatWis["kategori_wisata"] == "Religi") { ?>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Wisata
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item"> 
                  <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegunungan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-air" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Air</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=wisata-religi" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Religi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?halaman=tambah-wisata" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah wisata</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>

          <?php } else { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Wisata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="index.php?halaman=wisata-pegunungan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegunungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-air" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Air</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=wisata-religi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah wisata</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if($_GET['halaman'] == 'daftar-restoran') { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Restoran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-restoran" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah restoran</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'tambah-restoran') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Restoran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-restoran" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah restoran</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'edit-restoran') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Restoran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-restoran" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah restoran</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Restoran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah restoran</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if($_GET['halaman'] == 'daftar-penginapan') { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Penginapan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-penginapan" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar penginapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah penginapan</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'tambah-penginapan') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Penginapan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar penginapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-penginapan" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah penginapan</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'edit-penginapan') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Penginapan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-penginapan" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar penginapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah penginapan</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Penginapan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=daftar-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar penginapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=tambah-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah penginapan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          

          <?php if($_GET['halaman'] == 'galeri-wisata') { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galeri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=galeri-wisata" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penginapan</p>
                </a>
              </li>
            </ul>
          </li>  

          <?php } else if($_GET['halaman'] == 'galeri-restoran') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galeri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=galeri-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-restoran" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penginapan</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else if($_GET['halaman'] == 'galeri-penginapan') { ?>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galeri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=galeri-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-penginapan" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penginapan</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } else { ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galeri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=galeri-wisata" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-restoran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restoran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=galeri-penginapan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penginapan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <li class="nav-item">
            <?php if($_GET['halaman'] == 'subscriber') { ?>
            <a href="index.php?halaman=subscriber" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Subscribers
                <?php if($jmlSubsBaru > 0) { ?>
                <span class="right badge badge-danger">Baru</span>
                <?php } ?>
              </p>
            </a>

            <?php } else { ?>

            <a href="index.php?halaman=subscriber" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Subscribers
                <?php if($jmlSubsBaru > 0) { ?>
                <span class="right badge badge-danger">Baru</span>
                <?php } ?>
              </p>
            </a>
            <?php } ?>
          </li>


          <li class="nav-item">

            <a href="logout.php" class="nav-link link-logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


<!-- script modal alert keluar -->
<script src="dist/js/sweetalert/sweetalert-script.js"></script>