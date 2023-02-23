<?php

  // jika tombol submit ditekan
  if(isset($_POST["submit"])) {
    // ambil foto dari form
    $namaFoto   = $_FILES["foto_restoran"]["name"];
    $namaLokasi = $_FILES["foto_restoran"]["tmp_name"];
    // ambil nama ekstensinya
    $namaEkstensi = pathinfo($namaFoto, PATHINFO_EXTENSION);

    // lokasi foto galeri yg diunggah
    $lokasiFileFoGal   = $_FILES["foto_restoran_galeri"]["tmp_name"];
    // hitung jumlah foto galeri yang dipilih(jika ada)
    $jumlah            = count($_FILES["foto_restoran_galeri"]["name"]);

    // cek apakah format foto valid / invalid
    if( $namaEkstensi == "jpg" || 
        $namaEkstensi == "JPG" || 
        $namaEkstensi == "png" || 
        $namaEkstensi == "PNG" ||
        $namaEkstensi == "jpeg" ||
        $namaEkstensi == "JPEG" ) {
        
        // aktifkan uniqid
        $uniqId = uniqid();
        // buat nama foto baru
        $namaFotoBaru = $uniqId."_".$namaFoto;
        // pindahkan foto dari lokasi sementara ke folder restaurant-img
        move_uploaded_file($namaLokasi, "dist/img/restaurant-img/" .$namaFotoBaru);

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

        // tambahkan data pada tabel restoran dengan data baru yang ada diform
        $conn->query("INSERT INTO tbl_restoran (nama_restoran, alamat_restoran, url_lokasi, peta_area, nomor_telepon, jam_buka, video_youtube, facebook, twitter, instagram, youtube, deskripsi_restoran, foto_restoran) VALUES ('$namaRestoran', '$alamatRestoran', '$urlLokasi', '$petaArea', '$nomorTelepon', '$jamBuka', '$videoYoutube', '$facebook', '$twitter', '$instagram', '$youtube', '$deskripsiRestoran', '$fotoRestoran') ");

        // ambil id restoran yg baru diinputkan ke tabel restoran
        $idRestoBarusan = $conn->insert_id;

        // cek jika ada foto galeri yg diunggah
        if($lokasiFileFoGal == [""]) {
          // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
          mysqli_query($conn, "INSERT INTO tbl_galeri_restoran (id_restoran) VALUES ('$idRestoBarusan')");
          // ambil id galeri restoran yg baru diinputkan ke tabel galeri restoran
          $idGalResBarusan = $conn->insert_id;

          // ambil id restoran yg baru saja diinput, tapi id restoran yg ada ditabel galeri restoran
          $ambilIdRes = mysqli_query($conn, "SELECT * FROM tbl_galeri_restoran WHERE id_galeri_restoran = '$idGalResBarusan' ");
          $pecahIdRes = mysqli_fetch_assoc($ambilIdRes);

          // pesan berhasil menambahkan data & kirim notifikasi email ke semua subscribers
          echo "<script>

                  Swal.fire({
                      icon: 'success',
                      title: 'Data berhasil ditambahkan',
                      text: 'Anda belum unggah foto galeri, anda bisa mengunggahnya dihalaman edit restoran',
                      showConfirmButton: true
                  }).then(() => {
                      document.location.href = 'index.php?halaman=resto-mail&id={$pecahIdRes['id_restoran']}';
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

            // masukkan semua foto yang dipilih ke dalam tabel galeri restoran
            mysqli_query($conn, "INSERT INTO tbl_galeri_restoran (id_restoran, foto_1, foto_2, foto_3, foto_4) VALUES ('$idRestoBarusan', '$foto[0]', '$foto[1]', '$foto[2]', '$foto[3]')");

            // ambil id galeri restoran yg baru diinputkan ke tabel galeri restoran
            $idGalResBarusan = $conn->insert_id;

            // ambil id restoran yg baru saja diinput, tapi id restoran yg ada ditabel galeri restoran
            $ambilIdRes = mysqli_query($conn, "SELECT * FROM tbl_galeri_restoran WHERE id_galeri_restoran = '$idGalResBarusan' ");
            $pecahIdRes = mysqli_fetch_assoc($ambilIdRes);

            // pesan berhasil menambahkan data & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=resto-mail&id={$pecahIdRes['id_restoran']}';
                    })

            </script>";

          }
          // jika foto yang dipilih kurang dari 4 atau lebih dari 4
          else if($jumlah < 4 || $jumlah > 4) {
            // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
            mysqli_query($conn, "INSERT INTO tbl_galeri_restoran (id_restoran) VALUES ('$idRestoBarusan')");

            // ambil id galeri restoran yg baru diinputkan ke tabel galeri restoran
            $idGalResBarusan = $conn->insert_id;

            // ambil id restoran yg baru saja diinput, tapi id restoran yg ada ditabel galeri restoran
            $ambilIdRes = mysqli_query($conn, "SELECT * FROM tbl_galeri_restoran WHERE id_galeri_restoran = '$idGalResBarusan' ");
            $pecahIdRes = mysqli_fetch_assoc($ambilIdRes);

            // pesan gagal menambahkan foto galeri & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal mengunggah foto galeri!',
                        text: 'Jumlah foto galeri harus 4! Anda bisa unggah kembali foto galeri ini dihalaman edit restoran',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=resto-mail&id={$pecahIdRes['id_restoran']}';
                    })

            </script>";

          }
          // selain itu gagal upload
          else {
            // masukkan data ke dalam tabel galeri restoran tanpa memasukkan foto restoran galeri
            mysqli_query($conn, "INSERT INTO tbl_galeri_restoran (id_restoran) VALUES ('$idRestoBarusan')");

            // ambil id galeri restoran yg baru diinputkan ke tabel galeri restoran
            $idGalResBarusan = $conn->insert_id;

            // ambil id restoran yg baru saja diinput, tapi id restoran yg ada ditabel galeri restoran
            $ambilIdRes = mysqli_query($conn, "SELECT * FROM tbl_galeri_restoran WHERE id_galeri_restoran = '$idGalResBarusan' ");
            $pecahIdRes = mysqli_fetch_assoc($ambilIdRes);

            // pesan gagal menambahkan foto galeri & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal mengunggah foto galeri!',
                        text: 'Anda bisa unggah kembali foto galeri ini dihalaman edit restoran',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=resto-mail&id={$pecahIdRes['id_restoran']}';
                    })

            </script>";

          }
          
        }

    }
    else {
        // jika foto invalid/format foto salah/bukan foto
        // pesan gagal menyimpan data
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Format foto salah!',
                    text: 'Gunakan format foto yang valid',
                    showConfirmButton: true
                })

        </script>";

    }

  }

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Restoran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Restoran</li>
          <li class="breadcrumb-item active">Tambah restoran</li>
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
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
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
                  <input type="text" class="form-control" id="nama-restoran" placeholder="Enter nama restoran" name="nama_restoran" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat-restoran">Alamat restoran</label>
                  <input type="text" class="form-control" id="alamat-restoran" placeholder="Enter alamat restoran" name="alamat_restoran" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url-lokasi">Url lokasi</label>
                  <input type="text" class="form-control" id="url-lokasi" placeholder="Enter url lokasi" name="url_lokasi" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="peta-area">Peta Area</label>
                  <input type="text" class="form-control" id="peta-area" name="peta_area" placeholder="Enter peta area(source peta area)" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor-telepon">Nomor Telepon</label>
                  <input type="number" class="form-control" id="nomor-telepon" name="nomor_telepon" placeholder="Enter nomor telepon" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam-buka">Jam buka</label>
                  <input type="text" class="form-control" id="jam-buka" name="jam_buka" placeholder="Enter jam buka" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter akun facebook" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter akun twitter" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter akun instagram" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Youtube</label>
                  <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter youtube channel" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="video-youtube">Video Youtube</label>
                  <input type="text" class="form-control" id="video-youtube" name="video_youtube" placeholder="Enter video youtube" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-foto">Input foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-foto" name="foto_restoran" required>
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
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi_restoran" required></textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.card-body -->

          <!-- save-button -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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

          </div>
          <!-- /.card-body -->

          </form>
          
        </div>
        <!-- /.card -->
      </div>
    </div>  

  </div>
</section>