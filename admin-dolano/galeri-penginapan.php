<?php 

  // ambil semua data foto galeri penginapan pada tabel galeri penginapan
  $ambilFotoGalPengi = $conn->query("SELECT * FROM tbl_penginapan JOIN tbl_galeri_penginapan ON tbl_penginapan.id_penginapan = tbl_galeri_penginapan.id_penginapan");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Galeri Penginapan</h1>
            </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
                  <li class="breadcrumb-item">Galeri</li>
                  <li class="breadcrumb-item active">Penginapan</li>
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

            <!-- <div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="custom-select" style="" data-sortOrder>
                      <option value=""> Pantai Cahaya </option>
                      <option value=""> Curug Sewu </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-default"> Cari </button>
                    </div> 
                  </div>
                </div>
                <div class="col-sm-6"></div>
              </div>   
            </div> -->

            <div>
              <div class="filter-container p-0 row">

                <?php while($pecahFotoGalPengi = $ambilFotoGalPengi->fetch_assoc()) { ?>

                  <?php if($pecahFotoGalPengi["foto_1"] != "") { ?>

                    <div class="filtr-item col-sm-3" data-category="" data-sort="">
                      <a href="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_1']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalPengi['nama_penginapan']; ?>" data-gallery="gallery">
                        <img src="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_1']; ?>" class=" mb-2" alt="Foto 1" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="" data-sort="">
                      <a href="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_2']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalPengi['nama_penginapan']; ?>" data-gallery="gallery">
                        <img src="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_2']; ?>" class=" mb-2" alt="Foto 2" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="" data-sort="">
                      <a href="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_3']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalPengi['nama_penginapan']; ?>" data-gallery="gallery">
                        <img src="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_3']; ?>" class=" mb-2" alt="Foto 3" width="100%" height="150px" />
                      </a>
                    </div>

                    <div class="filtr-item col-sm-3" data-category="" data-sort="">
                      <a href="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_4']; ?>" data-toggle="lightbox" data-title="<?=$pecahFotoGalPengi['nama_penginapan']; ?>" data-gallery="gallery">
                        <img src="dist/img/lodging-gallery/<?=$pecahFotoGalPengi['foto_4']; ?>" class=" mb-2" alt="Foto 4" width="100%" height="150px" />
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