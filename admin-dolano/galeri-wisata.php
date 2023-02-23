<?php 

  // ambil semua data tabel wisata & galeri wisata pada tabel wisata & galeri wisata
  $ambilFotoGalWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_galeri_wisata ON tbl_wisata.id_wisata = tbl_galeri_wisata.id_wisata");

  // ambil kategori wisata pada tabel kategori wisata
  // $ambilKatWis = $conn->query("SELECT * FROM tbl_kategori_wisata");

  // ambil nama wisata dari tabel wisata
  // $ambilNamaWis = $conn->query("SELECT * FROM tbl_wisata");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Galeri Wisata</h1>
            </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
                  <li class="breadcrumb-item">Galeri</li>
                  <li class="breadcrumb-item active">Wisata</li>
              </ol>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Galeri foto</h4>
          </div>
          <div class="card-body">

            <div>
              <div class="btn-group w-100 mb-2">
                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua foto </a>
                <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Pegunungan </a>
                <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Air </a>
                <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Religi </a>
              </div>
            </div>

            <div>
              <div class="filter-container p-0 row" id="load-search">

                <?php while($pecahFotoGalWis = $ambilFotoGalWis->fetch_assoc()) { ?>

                  <?php if($pecahFotoGalWis["foto_1"] != "") { ?>
                    
                    <div class="filtr-item col-sm-3" data-category="<?=$pecahFotoGalWis['id_kategori_wisata']; ?>" data-sort="">
                      <a href="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_1']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalWis['nama_wisata']; ?>" data-gallery="gallery">
                        <img src="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_1']; ?>" class=" mb-2" alt="Foto 1" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="<?=$pecahFotoGalWis['id_kategori_wisata']; ?>" data-sort="">
                      <a href="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_2']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalWis['nama_wisata']; ?>" data-gallery="gallery">
                        <img src="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_2']; ?>" class=" mb-2" alt="Foto 2" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="<?=$pecahFotoGalWis['id_kategori_wisata']; ?>" data-sort="">
                      <a href="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_3']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalWis['nama_wisata']; ?>" data-gallery="gallery">
                        <img src="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_3']; ?>" class=" mb-2" alt="Foto 3" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="<?=$pecahFotoGalWis['id_kategori_wisata']; ?>" data-sort="">
                      <a href="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_4']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalWis['nama_wisata']; ?>" data-gallery="gallery">
                        <img src="dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_4']; ?>" class=" mb-2" alt="Foto 4" width="100%" height="150px" />
                      </a>
                    </div>
  
                  <?php } ?>

                <?php } ?>
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content