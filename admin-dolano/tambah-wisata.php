<?php

  // ambil data kategori wisata dari tabel kategori wisata(untuk data wisata)
  $ambilDatKatWis = $conn->query("SELECT * FROM tbl_kategori_wisata");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Wisata</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Wisata</li>
          <li class="breadcrumb-item active">Tambah wisata</li>
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
            <h3 class="card-title">Input wisata</h3>

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
                  <label for="nama-wisata">Nama wisata</label>
                  <input type="text" class="form-control" id="nama-wisata" name="nama_wisata" placeholder="Enter nama wisata" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat-wisata">Alamat wisata</label>
                  <input type="text" class="form-control" id="alamat-wisata" name="alamat_wisata" placeholder="Enter alamat wisata" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url-lokasi">Url lokasi</label>
                  <input type="text" class="form-control" id="url-lokasi" name="url_lokasi" placeholder="Enter url lokasi" required>
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
                  <label for="harga-tiket-dewasa">Harga tiket (Dewasa)</label>
                  <input type="text" class="form-control" id="harga-tiket-dewasa" name="harga_tiket_dewasa" placeholder="Enter harga tiket dewasa" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="harga-tiket-anak">Harga tiket (Anak)</label>
                  <input type="text" class="form-control" id="harga-tiket-anak" name="harga_tiket_anak" placeholder="Enter harga tiket anak" required>
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
                <!-- select -->
                <div class="form-group">
                  <label>Kategori wisata</label>
                  <select class="form-control" name="id_kategori_wisata" required>
                    <option value="">Pilih kategori wisata</option>
                    <?php 
                      while($pecahDatKatWis = $ambilDatKatWis->fetch_assoc()) {
                    ?>
                    <option value="<?=$pecahDatKatWis['id_kategori_wisata']; ?>">
                      <?=$pecahDatKatWis['kategori_wisata']; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="video-youtube">Video Youtube</label>
                  <input type="text" class="form-control" id="video-youtube" name="video_youtube" placeholder="Enter video youtube" required>
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
                <!-- textarea -->
                <div class="form-group">
                  <label>Deskripsi wisata</label>
                  <textarea class="form-control" rows="3" name="deskripsi_wisata" placeholder="Enter ..." required></textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-foto">Input foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-foto" name="foto_wisata" required>
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

          </div>
          <!-- /.card-body -->

          <!-- save-button -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            <a href="index.php?halaman=wisata-pegunungan" class="btn btn-secondary">Batal</a>
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
                  <input type="file" class="custom-file-input" id="input-foto-galeri" name="foto_wisata_galeri[]" multiple="multiple">
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


<!-- PHP Script -->
<?php 

  // jika tombol submit ditekan
  if(isset($_POST["submit"])) {
    // ambil foto dari form(nama foto dan lokasi foto wisata/thumbnail)
    $namaFoto   = $_FILES["foto_wisata"]["name"];
    $lokasiFoto = $_FILES["foto_wisata"]["tmp_name"];
    // ambil nama ekstensinya(foto wisata/thumbnail)
    $namaEkstensi = pathinfo($namaFoto, PATHINFO_EXTENSION);

    // lokasi foto galeri yg diunggah
    $lokasiFileFoGal   = $_FILES["foto_wisata_galeri"]["tmp_name"];
    // hitung jumlah foto galeri yang dipilih(jika ada)
    $jumlah            = count($_FILES["foto_wisata_galeri"]["name"]);

    // cek apakah format foto valid / invalid (foto wisata/thumbnail)
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
        // pindahkan foto dari lokasi sementara ke folder tourist-img
        move_uploaded_file($lokasiFoto, "dist/img/tour-img/" .$namaFotoBaru);

        // ambil data dari form
        $namaWisata         = htmlspecialchars($_POST["nama_wisata"]);
        $alamatWisata       = htmlspecialchars($_POST["alamat_wisata"]);
        $urlLokasi          = htmlspecialchars($_POST["url_lokasi"]);
        $petaArea           = htmlspecialchars($_POST["peta_area"]);
        $nomorTelepon       = htmlspecialchars($_POST["nomor_telepon"]);
        $jamBuka            = htmlspecialchars($_POST["jam_buka"]);
        $hargaTiketDewasa   = htmlspecialchars($_POST["harga_tiket_dewasa"]);
        $hargaTiketAnak     = htmlspecialchars($_POST["harga_tiket_anak"]);
        $idKategoriWisata   = htmlspecialchars($_POST["id_kategori_wisata"]);
        $videoYoutube       = htmlspecialchars($_POST["video_youtube"]);
        $facebook           = htmlspecialchars($_POST["facebook"]);
        $twitter            = htmlspecialchars($_POST["twitter"]);
        $instagram          = htmlspecialchars($_POST["instagram"]);
        $youtube            = htmlspecialchars($_POST["youtube"]);
        $deskripsiWisata    = htmlspecialchars($_POST["deskripsi_wisata"]);
        $fotoWisata         = $namaFotoBaru;

        // masukkan data wisata baru ke dalam tabel wisata
        $conn->query("INSERT INTO tbl_wisata (nama_wisata, alamat_wisata, url_lokasi, peta_area, nomor_telepon, jam_buka, harga_tiket_dewasa, harga_tiket_anak, id_kategori_wisata, video_youtube, facebook, twitter, instagram, youtube, deskripsi_wisata, foto_wisata) VALUES ('$namaWisata', '$alamatWisata', '$urlLokasi', '$petaArea', '$nomorTelepon', '$jamBuka', '$hargaTiketDewasa', '$hargaTiketAnak', '$idKategoriWisata', '$videoYoutube', '$facebook', '$twitter', '$instagram', '$youtube', '$deskripsiWisata', '$fotoWisata') ");

        // ambil id wisata yg baru diinputkan ke tabel wisata
        $idWisataBarusan = $conn->insert_id;

        // cek jika ada foto galeri yg diunggah
        if($lokasiFileFoGal == [""]) {
          // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
          mysqli_query($conn, "INSERT INTO tbl_galeri_wisata (id_kategori_wisata, id_wisata) VALUES ('$idKategoriWisata', '$idWisataBarusan')");

          // ambil id galeri wisata yg baru diinputkan ke tabel galeri wisata
          $idGalWisBarusan = $conn->insert_id;

          // ambil id wisata yg baru saja diinput, tapi id wisata yg ada ditabel galeri wisata
          $ambilIdWis = mysqli_query($conn, "SELECT * FROM tbl_galeri_wisata WHERE id_galeri_wisata = '$idGalWisBarusan' ");
          $pecahIdWis = mysqli_fetch_assoc($ambilIdWis);

          // pesan berhasil menambahkan data & kirim notifikasi email ke semua subscribers
          echo "<script>

                  Swal.fire({
                      icon: 'success',
                      title: 'Data berhasil ditambahkan',
                      text: 'Anda belum unggah foto galeri, anda bisa mengunggahnya dihalaman edit wisata',
                      showConfirmButton: true
                  }).then(() => {
                      document.location.href = 'index.php?halaman=wisata-mail&id={$pecahIdWis['id_wisata']}';
                  })

          </script>";
          
        }
        else {
          // jika foto yang dipilih ada 4
          if($jumlah == 4) {
            // lakukan looping
            for ($i = 0; $i < $jumlah; $i++) { 
              $namaFileFoGal       = $_FILES["foto_wisata_galeri"]["name"][$i];
              $lokasiFileFoGalLoop = $_FILES["foto_wisata_galeri"]["tmp_name"][$i];
              $namaFileFoGalBaru   = uniqid();
              $namaFileFoGal       = $namaFileFoGalBaru.".jpg";
            
              // pindahkan foto galeri dari lokasi sementara ke folder tour gallery
              move_uploaded_file($lokasiFileFoGalLoop, "dist/img/tour-gallery/". $namaFileFoGal);
              // masukkan setiap nama foto baru yang sudah dibuat ke variabel foto 
              $foto[$i] = $namaFileFoGal;
            }

            // masukkan semua foto yang dipilih ke dalam tabel galeri wisata
            mysqli_query($conn, "INSERT INTO tbl_galeri_wisata (id_kategori_wisata, id_wisata, foto_1, foto_2, foto_3, foto_4) VALUES ('$idKategoriWisata', '$idWisataBarusan', '$foto[0]', '$foto[1]', '$foto[2]', '$foto[3]')");

            // ambil id galeri wisata yg baru diinputkan ke tabel galeri wisata
            $idGalWisBarusan = $conn->insert_id;

            // ambil id wisata yg baru saja diinput, tapi id wisata yg ada ditabel galeri wisata
            $ambilIdWis = mysqli_query($conn, "SELECT * FROM tbl_galeri_wisata WHERE id_galeri_wisata = '$idGalWisBarusan' ");
            $pecahIdWis = mysqli_fetch_assoc($ambilIdWis);

            // pesan berhasil menambahkan data & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=wisata-mail&id={$pecahIdWis['id_wisata']}';
                    })

            </script>";

          }
          // jika foto yang dipilih kurang dari 4 atau lebih dari 4
          else if($jumlah < 4 || $jumlah > 4) {
            // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
            mysqli_query($conn, "INSERT INTO tbl_galeri_wisata (id_kategori_wisata, id_wisata) VALUES ('$idKategoriWisata', '$idWisataBarusan')");

            // ambil id galeri wisata yg baru diinputkan ke tabel galeri wisata
            $idGalWisBarusan = $conn->insert_id;

            // ambil id wisata yg baru saja diinput, tapi id wisata yg ada ditabel galeri wisata
            $ambilIdWis = mysqli_query($conn, "SELECT * FROM tbl_galeri_wisata WHERE id_galeri_wisata = '$idGalWisBarusan' ");
            $pecahIdWis = mysqli_fetch_assoc($ambilIdWis);

            // pesan gagal menambahkan foto galeri & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal mengunggah foto galeri!',
                        text: 'Jumlah foto galeri harus 4! Anda bisa unggah kembali foto galeri ini dihalaman edit wisata',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=wisata-mail&id={$pecahIdWis['id_wisata']}';
                    })

            </script>";

          }
          // selain itu gagal upload
          else {
            // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
            mysqli_query($conn, "INSERT INTO tbl_galeri_wisata (id_kategori_wisata, id_wisata) VALUES ('$idKategoriWisata', '$idWisataBarusan')");

            // ambil id galeri wisata yg baru diinputkan ke tabel galeri wisata
            $idGalWisBarusan = $conn->insert_id;

            // ambil id wisata yg baru saja diinput, tapi id wisata yg ada ditabel galeri wisata
            $ambilIdWis = mysqli_query($conn, "SELECT * FROM tbl_galeri_wisata WHERE id_galeri_wisata = '$idGalWisBarusan' ");
            $pecahIdWis = mysqli_fetch_assoc($ambilIdWis);

            // pesan gagal menambahkan foto galeri & kirim notifikasi email ke semua subscribers
            echo "<script>

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal mengunggah foto galeri!',
                        text: 'Anda bisa unggah kembali foto galeri ini dihalaman edit wisata',
                        showConfirmButton: true
                    }).then(() => {
                        document.location.href = 'index.php?halaman=wisata-mail&id={$pecahIdWis['id_wisata']}';
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