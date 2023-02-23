<?php

  // ambil id restoran di url
  $idUrl = $_GET['id'];

  // jika tombol submit ditekan
  if(isset($_POST["submit"])) {
    // ambil foto dari form
    $namaFoto   = $_FILES["foto_restoran"]["name"];
    $namaLokasi = $_FILES["foto_restoran"]["tmp_name"];
    // buat nama foto baru dengan uniqid
    $uniqId = uniqid();
    $namaFotoBaru = $uniqId ."_". $namaFoto;
    // ambil semua data pada form
    $namaRestoran       = htmlspecialchars($_POST["nama_restoran"]);
    $alamatRestoran     = htmlspecialchars($_POST["alamat_restoran"]);
    $urlLokasi          = htmlspecialchars($_POST["url_lokasi"]);
    $petaArea           = htmlspecialchars($_POST["peta_area"]);
    $nomorTelepon       = htmlspecialchars($_POST["nomor_telepon"]);
    $jamBuka            = htmlspecialchars($_POST["jam_buka"]);
    $facebook           = htmlspecialchars($_POST["facebook"]);
    $twitter            = htmlspecialchars($_POST["twitter"]);
    $instagram          = htmlspecialchars($_POST["instagram"]);
    $youtube            = htmlspecialchars($_POST["youtube"]);
    $videoYoutube       = htmlspecialchars($_POST["video_youtube"]);
    $deskripsiRestoran  = htmlspecialchars($_POST["deskripsi_restoran"]);
    $fotoRestoran       = $namaFotoBaru;

    // jika ada foto yang diedit
    if(!empty($namaLokasi)) {

      // ambil nama ekstensinya
      $namaEkstensi = pathinfo($namaFoto, PATHINFO_EXTENSION);
      // cek apakah format foto valid / invalid
      if( $namaEkstensi == "jpg" || 
          $namaEkstensi == "JPG" || 
          $namaEkstensi == "png" || 
          $namaEkstensi == "PNG" ||
          $namaEkstensi == "jpeg" ||
          $namaEkstensi == "JPEG" ) {

        // pindahkan foto dari lokasi sementara ke folder restaurant-img
        move_uploaded_file($namaLokasi, "dist/img/restaurant-img/" .$namaFotoBaru);
        // edit data pada tabel restoran dengan data baru yang ada diform
        $conn->query("UPDATE tbl_restoran SET nama_restoran = '$namaRestoran', alamat_restoran = '$alamatRestoran', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', jam_buka = '$jamBuka', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_restoran = '$deskripsiRestoran', foto_restoran = '$fotoRestoran' WHERE id_restoran = '$idUrl'");

      }
      else {

        // jika foto invalid/format foto salah/bukan foto
        // pesan gagal update data
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Format foto salah!',
                    text: 'Gunakan format foto yang valid',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=edit-restoran&id={$idUrl}';
                })

        </script>";

        die();

      }
     
    }
    else {

      // update data pada tabel restoran dengan data baru yang ada diform
      $conn->query("UPDATE tbl_restoran SET nama_restoran = '$namaRestoran', alamat_restoran = '$alamatRestoran', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', jam_buka = '$jamBuka', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_restoran = '$deskripsiRestoran' WHERE id_restoran = '$idUrl'");

    }

    // lokasi foto galeri yg diunggah
    $lokasiFileFoGal   = $_FILES["foto_restoran_galeri"]["tmp_name"];
    // hitung jumlah foto galeri yang dipilih(jika ada)
    $jumlah            = count($_FILES["foto_restoran_galeri"]["name"]);

    // cek jika ada foto galeri yg diunggah
    if($lokasiFileFoGal == [""]) {
      // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
      mysqli_query($conn, "UPDATE tbl_galeri_restoran SET id_restoran = '$idUrl' WHERE id_restoran = '$idUrl' ");

      // tampilkan pesan sukses update data & alihkan kehalaman daftar restoran
      echo "<script>

              Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil diperbarui',
                  showConfirmButton: true
              }).then(() => {
                  document.location.href = 'index.php?halaman=daftar-restoran';
              })

      </script>";

    }
    else {
      // jika foto yang dipilih ada 4
      if($jumlah == 4) {
        // lakukan looping
        for ($i = 0; $i < $jumlah; $i++) { 
          $namaFileFoGal       = $_FILES["foto_restoran_galeri"]["name"][$i];
          $lokasiFileFoGalLoop = $_FILES["foto_restoran_galeri"]["tmp_name"][$i];
          $namaFileFoGalBaru   = uniqid();
          $namaFileFoGal       = $namaFileFoGalBaru.".jpg";
        
          // pindahkan foto galeri dari lokasi sementara ke folder restaurant gallery
          move_uploaded_file($lokasiFileFoGalLoop, "dist/img/restaurant-gallery/". $namaFileFoGal);
          // masukkan setiap nama foto baru yang sudah dibuat ke variabel foto 
          $foto[$i] = $namaFileFoGal;
        }

        // perbarui dengan semua foto yang dipilih, dan masukkan ke dalam tabel galeri restoran
        mysqli_query($conn, "UPDATE tbl_galeri_restoran SET id_restoran = '$idUrl', foto_1 = '$foto[0]', foto_2 = '$foto[1]', foto_3 = '$foto[2]', foto_4 = '$foto[3]' WHERE id_restoran = '$idUrl' ");

        // tampilkan pesan sukses update data
        echo "<script>

                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diperbarui',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=daftar-restoran';
                })

        </script>";

      }
      // jika foto yang dipilih kurang dari 4 atau lebih dari 4
      else if($jumlah < 4 || $jumlah > 4) {
        // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
        mysqli_query($conn, "UPDATE tbl_galeri_restoran SET id_restoran = '$idUrl' WHERE id_restoran = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    text: 'Jumlah foto galeri harus 4!',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=edit-restoran&id={$idUrl}';
                })

        </script>";

      }
      // selain itu gagal upload
      else {
        // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
        mysqli_query($conn, "UPDATE tbl_galeri_restoran SET id_restoran = '$idUrl' WHERE id_restoran = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=edit-restoran&id={$idUrl}';
                })

        </script>";

      }

    }

  }

  // ambil data restoran ditabel restoran berdasarkan id restoran di url
  $ambilDataRestoran = $conn->query("SELECT * FROM tbl_restoran JOIN tbl_galeri_restoran ON tbl_restoran.id_restoran = tbl_galeri_restoran.id_restoran WHERE tbl_restoran.id_restoran = '$idUrl'");
  $pecahDataRestoran = $ambilDataRestoran->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Restoran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Restoran</li>
          <li class="breadcrumb-item active">Edit restoran</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Input restoran</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama-restoran">Nama restoran</label>
                  <input type="text" class="form-control" id="nama-restoran" name="nama_restoran" placeholder="Enter nama restoran" value="<?=$pecahDataRestoran['nama_restoran']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat-restoran">Alamat restoran</label>
                  <input type="text" class="form-control" id="alamat-restoran" name="alamat_restoran" placeholder="Enter alamat restoran" value="<?=$pecahDataRestoran['alamat_restoran']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url-lokasi">Url lokasi</label>
                  <input type="text" class="form-control" id="url-lokasi" name="url_lokasi" placeholder="Enter url lokasi" value="<?=$pecahDataRestoran['url_lokasi']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="peta-area">Peta Area</label>
                  <input type="text" class="form-control" id="peta-area" name="peta_area" placeholder="Enter peta area(source peta area)" value="<?=$pecahDataRestoran['peta_area']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor-telepon">Nomor Telepon</label>
                  <input type="number" class="form-control" id="nomor-telepon" name="nomor_telepon" placeholder="Enter nomor telepon" value="<?=$pecahDataRestoran['nomor_telepon']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam-buka">Jam buka</label>
                  <input type="text" class="form-control" id="jam-buka" name="jam_buka" placeholder="Enter jam buka" value="<?=$pecahDataRestoran['jam_buka']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter akun facebook" value="<?=$pecahDataRestoran['facebook']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter akun twitter" value="<?=$pecahDataRestoran['twitter']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter akun instagram" value="<?=$pecahDataRestoran['instagram']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Youtube</label>
                  <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter youtube channel" value="<?=$pecahDataRestoran['youtube']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="video-youtube">Video Youtube</label>
                  <input type="text" class="form-control" id="video-youtube" name="video_youtube" placeholder="Enter video youtube" value="<?=$pecahDataRestoran['video_youtube']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-foto">Input foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-foto" name="foto_restoran">
                      <label class="custom-file-label" for="input-foto">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Deskripsi restoran</label>
                  <textarea class="form-control" rows="3" name="deskripsi_restoran" placeholder="Enter ..."  required><?=$pecahDataRestoran['deskripsi_restoran']; ?></textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- Foto lama -->
                <div class="form-group">
                  <img src="dist/img/restaurant-img/<?=$pecahDataRestoran['foto_restoran']; ?>" class="" alt="Foto restoran lama." width="100%" height="150">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.card-body -->

          <!-- save-button -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit">Perbarui</button>
            <a href="index.php?halaman=daftar-restoran" class="btn btn-secondary">Batal</a>
          </div>

        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-4">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Input foto galeri</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            
            <div class="form-group">
              <label for="nam-resto-gal">Nama restoran</label>
              <input type="text" class="form-control" id="nam-resto-gal" name="nama_restoran_galeri" value="<?=$pecahDataRestoran['nama_restoran']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="input-foto-galeri">Input foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="input-foto-galeri" name="foto_restoran_galeri[]" multiple="multiple">
                  <label class="custom-file-label" for="input-foto-galeri">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>

              <em><p class="text-danger">* Foto galeri harus 4!</p></em>
            </div>

            <?php if(empty($pecahDataRestoran['foto_1'])) { ?>
            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="img-fluid img-thumbnail" src="dist/img/no-img/no-image-2.jpg" alt="Foto 1">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="img-fluid img-thumbnail" src="dist/img/no-img/no-image-2.jpg" alt="Foto 2">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="img-fluid img-thumbnail" src="dist/img/no-img/no-image-2.jpg" alt="Foto 3">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="img-fluid img-thumbnail" src="dist/img/no-img/no-image-2.jpg" alt="Foto 4">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <?php } else { ?>

            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="" src="dist/img/restaurant-gallery/<?=$pecahDataRestoran['foto_1']; ?>" alt="Foto 1" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/restaurant-gallery/<?=$pecahDataRestoran['foto_2']; ?>" alt="Foto 2" width="100%" height="80px">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="" src="dist/img/restaurant-gallery/<?=$pecahDataRestoran['foto_3']; ?>" alt="Foto 3" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/restaurant-gallery/<?=$pecahDataRestoran['foto_4']; ?>" alt="Foto 4" width="100%" height="80px">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php } ?>

          </div>
          <!-- /.card-body -->

          </form>
          
        </div>
        <!-- /.card -->
      </div>
    </div>
    

  </div>
</section>