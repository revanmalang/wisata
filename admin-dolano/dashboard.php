<?php 
  
  // mengambil data dari tabel wisata
  $ambilDataWisata = $conn->query("SELECT * FROM tbl_wisata");
  // jml data wisata
  $jmlDataWisata   = $ambilDataWisata->num_rows;

  // mengambil data dari tabel restoran
  $ambilDataRestoran = $conn->query("SELECT * FROM tbl_restoran");
  // jml data restoran
  $jmlDataRestoran   = $ambilDataRestoran->num_rows;

  // mengambil data dari tabel penginapan
  $ambilDataPenginapan = $conn->query("SELECT * FROM tbl_penginapan");
  // jml data penginapan
  $jmlDataPenginapan   = $ambilDataPenginapan->num_rows;

  // mengambil data dari tabel subscriber 
  $ambilDataSubscriber = $conn->query("SELECT * FROM tbl_subscriber WHERE status = 'Mengikuti' ");
  // jml data subscriber
  $jmlDataSubscriber   = $ambilDataSubscriber->num_rows;

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard Dolano</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Dolano</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tree"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Wisata</span>
            <span class="info-box-number">
              <?=$jmlDataWisata; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-utensils"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Restoran</span>
            <span class="info-box-number"><?=$jmlDataRestoran; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bed"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Penginapan</span>
            <span class="info-box-number"><?=$jmlDataPenginapan; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Subscriber</span>
            <span class="info-box-number"><?=$jmlDataSubscriber; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div><!--/. container-fluid -->
</section>
<!-- /.content -->