<?php

  // ambil id penginapan di url
  $idUrl = $_GET['id'];

  // jika tombol submit ditekan
  if(isset($_POST["submit"])) {
    // ambil foto dari form
    $namaFoto   = $_FILES["foto_penginapan"]["name"];
    $namaLokasi = $_FILES["foto_penginapan"]["tmp_name"];
    // buat nama foto baru dengan uniqid
    $uniqId = uniqid();
    $namaFotoBaru = $uniqId ."_". $namaFoto;
    // ambil semua data pada form
    $namaPenginapan       = htmlspecialchars($_POST["nama_penginapan"]);
    $alamatPenginapan     = htmlspecialchars($_POST["alamat_penginapan"]);
    $urlLokasi            = htmlspecialchars($_POST["url_lokasi"]);
    $petaArea             = htmlspecialchars($_POST["peta_area"]);
    $nomorTelepon         = htmlspecialchars($_POST["nomor_telepon"]);
    $videoYoutube         = htmlspecialchars($_POST["video_youtube"]);
    $facebook             = htmlspecialchars($_POST["facebook"]);
    $twitter              = htmlspecialchars($_POST["twitter"]);
    $instagram            = htmlspecialchars($_POST["instagram"]);
    $youtube              = htmlspecialchars($_POST["youtube"]);
    $deskripsiPenginapan  = htmlspecialchars($_POST["deskripsi_penginapan"]);
    $fotoPenginapan       = $namaFotoBaru;

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

        // pindahkan foto dari lokasi sementara ke folder penginapan-img
        move_uploaded_file($namaLokasi, "dist/img/penginapan-img/" .$namaFotoBaru);
        // edit data pada tabel penginapan dengan data baru yang ada diform
        $conn->query("UPDATE tbl_penginapan SET nama_penginapan = '$namaPenginapan', alamat_penginapan = '$alamatPenginapan', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_penginapan = '$deskripsiPenginapan', foto_penginapan = '$fotoPenginapan' WHERE id_penginapan = '$idUrl'");
        
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
                    document.location.href = 'index.php?halaman=edit-penginapan&id={$idUrl}';
                })

        </script>";

        die();

      }
     
    }
    else {

      // update data pada tabel penginapan dengan data baru yang ada diform
      $conn->query("UPDATE tbl_penginapan SET nama_penginapan = '$namaPenginapan', alamat_penginapan = '$alamatPenginapan', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_penginapan = '$deskripsiPenginapan' WHERE id_penginapan = '$idUrl'");

    }

    // lokasi foto galeri yg diunggah
    $lokasiFileFoGal   = $_FILES["foto_penginapan_galeri"]["tmp_name"];
    // hitung jumlah foto galeri yang dipilih(jika ada)
    $jumlah            = count($_FILES["foto_penginapan_galeri"]["name"]);

    // cek jika ada foto galeri yg diunggah
    if($lokasiFileFoGal == [""]) {
      // masukkan data ke dalam tabel galeri penginapan tanpa memasukkan foto penginapan galeri
      mysqli_query($conn, "UPDATE tbl_galeri_penginapan SET id_penginapan = '$idUrl' WHERE id_penginapan = '$idUrl' ");

      // tampilkan pesan sukses update data & alihkan kehalaman daftar penginapan
      echo "<script>

              Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil diperbarui',
                  showConfirmButton: true
              }).then(() => {
                  document.location.href = 'index.php?halaman=daftar-penginapan';
              })

      </script>";

    }
    else {
      // jika foto yang dipilih ada 4
      if($jumlah == 4) {
        // lakukan looping
        for ($i = 0; $i < $jumlah; $i++) { 
          $namaFileFoGal       = $_FILES["foto_penginapan_galeri"]["name"][$i];
          $lokasiFileFoGalLoop = $_FILES["foto_penginapan_galeri"]["tmp_name"][$i];
          $namaFileFoGalBaru   = uniqid();
          $namaFileFoGal       = $namaFileFoGalBaru.".jpg";
        
          // pindahkan foto galeri dari lokasi sementara ke folder lodging gallery
          move_uploaded_file($lokasiFileFoGalLoop, "dist/img/lodging-gallery/". $namaFileFoGal);
          // masukkan setiap nama foto baru yang sudah dibuat ke variabel foto 
          $foto[$i] = $namaFileFoGal;
        }

        // perbarui dengan semua foto yang dipilih, dan masukkan ke dalam tabel galeri penginapan
        mysqli_query($conn, "UPDATE tbl_galeri_penginapan SET id_penginapan = '$idUrl', foto_1 = '$foto[0]', foto_2 = '$foto[1]', foto_3 = '$foto[2]', foto_4 = '$foto[3]' WHERE id_penginapan = '$idUrl' ");
  
        // tampilkan pesan sukses update data & alihkan kehalaman daftar penginapan
        echo "<script>

                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diperbarui',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=daftar-penginapan';
                })

        </script>";

      }
      // jika foto yang dipilih kurang dari 4 atau lebih dari 4
      else if($jumlah < 4 || $jumlah > 4) {
        // masukkan data ke dalam tabel galeri penginapan tanpa memasukkan foto penginapan galeri
        mysqli_query($conn, "UPDATE tbl_galeri_penginapan SET id_penginapan = '$idUrl' WHERE id_penginapan = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    text: 'Jumlah foto galeri harus 4!',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=edit-penginapan&id={$idUrl}';
                })

        </script>";

      }
      // selain itu gagal upload
      else {
        // masukkan data ke dalam tabel galeri penginapan tanpa memasukkan foto penginapan galeri
        mysqli_query($conn, "UPDATE tbl_galeri_penginapan SET id_penginapan = '$idUrl' WHERE id_penginapan = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=edit-penginapan&id={$idUrl}';
                })

        </script>";

      }

    }


  }

  // ambil data penginapan ditabel penginapan berdasarkan id penginapan di url
  $ambilDataPenginapan = $conn->query("SELECT * FROM tbl_penginapan JOIN tbl_galeri_penginapan ON tbl_penginapan.id_penginapan = tbl_galeri_penginapan.id_penginapan WHERE tbl_penginapan.id_penginapan = '$idUrl'");
  $pecahDataPenginapan = $ambilDataPenginapan->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Penginapan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Penginapan</li>
          <li class="breadcrumb-item active">Edit penginapan</li>
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
            <h3 class="card-title">Input penginapan</h3>

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
                  <label for="nama-penginapan">Nama penginapan</label>
                  <input type="text" class="form-control" id="nama-penginapan" name="nama_penginapan" placeholder="Enter nama penginapan" value="<?=$pecahDataPenginapan['nama_penginapan']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat-penginapan">Alamat penginapan</label>
                  <input type="text" class="form-control" id="alamat-penginapan" name="alamat_penginapan" placeholder="Enter alamat penginapan" value="<?=$pecahDataPenginapan['alamat_penginapan']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url-lokasi">Url lokasi</label>
                  <input type="text" class="form-control" id="url-lokasi" name="url_lokasi" placeholder="Enter url lokasi" value="<?=$pecahDataPenginapan['url_lokasi']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="peta-area">Peta Area</label>
                  <input type="text" class="form-control" id="peta-area" name="peta_area" placeholder="Enter peta area(source peta area)" value="<?=$pecahDataPenginapan['peta_area']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor-telepon">Nomor Telepon</label>
                  <input type="number" class="form-control" id="nomor-telepon" name="nomor_telepon" placeholder="Enter nomor telepon" value="<?=$pecahDataPenginapan['nomor_telepon']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="video-youtube">Video Youtube</label>
                  <input type="text" class="form-control" id="video-youtube" name="video_youtube" placeholder="Enter video youtube" value="<?=$pecahDataPenginapan['video_youtube']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter akun facebook" value="<?=$pecahDataPenginapan['facebook']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter akun twitter" value="<?=$pecahDataPenginapan['twitter']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter akun instagram" value="<?=$pecahDataPenginapan['instagram']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Youtube</label>
                  <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter youtube channel" value="<?=$pecahDataPenginapan['youtube']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Deskripsi penginapan</label>
                  <textarea class="form-control" rows="3" name="deskripsi_penginapan" placeholder="Enter ..."  required><?=$pecahDataPenginapan['deskripsi_penginapan']; ?></textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-foto">Input foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-foto" name="foto_penginapan">
                      <label class="custom-file-label" for="input-foto">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>

                <!-- Foto lama -->
                <div class="form-group">
                  <img src="dist/img/penginapan-img/<?=$pecahDataPenginapan['foto_penginapan']; ?>" class="" alt="Foto penginapan lama." width="100%" height="150">
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
            <a href="index.php?halaman=daftar-penginapan" class="btn btn-secondary">Batal</a>
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
              <label for="nam-penginapan-gal">Nama penginapan</label>
              <input type="text" class="form-control" id="nam-penginapan-gal" name="nama_penginapan_galeri" value="<?=$pecahDataPenginapan['nama_penginapan']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="input-foto-galeri">Input foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="input-foto-galeri" name="foto_penginapan_galeri[]" multiple="multiple">
                  <label class="custom-file-label" for="input-foto-galeri">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>

              <em><p class="text-danger">* Foto galeri harus 4!</p></em>
            </div>

            <?php if(empty($pecahDataPenginapan['foto_1'])) { ?>
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
                <img class="" src="dist/img/lodging-gallery/<?=$pecahDataPenginapan['foto_1']; ?>" alt="Foto 1" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/lodging-gallery/<?=$pecahDataPenginapan['foto_2']; ?>" alt="Foto 2" width="100%" height="80px">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="" src="dist/img/lodging-gallery/<?=$pecahDataPenginapan['foto_3']; ?>" alt="Foto 3" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/lodging-gallery/<?=$pecahDataPenginapan['foto_4']; ?>" alt="Foto 4" width="100%" height="80px">
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