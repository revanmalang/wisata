<?php

  // ambil id wisata di url
  $idUrl = $_GET['id'];

  // ambil data wisata ditabel wisata berdasarkan id wisata di url
  $ambilDataWisata = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata JOIN tbl_galeri_wisata ON tbl_galeri_wisata.id_wisata = tbl_wisata.id_wisata WHERE tbl_wisata.id_wisata = '$idUrl'");
  $pecahDataWisata = $ambilDataWisata->fetch_assoc();
  // ambil kategori wisata
  $katWis = strtolower($pecahDataWisata["kategori_wisata"]);

  // ambil data kategori wisata dari tabel kategori wisata(untuk data wisata)
  $ambilDatKatWis = $conn->query("SELECT * FROM tbl_kategori_wisata");

  // jika tombol submit ditekan
  if(isset($_POST["submit"])) {
    // ambil foto dari form
    $namaFoto   = $_FILES["foto_wisata"]["name"];
    $namaLokasi = $_FILES["foto_wisata"]["tmp_name"];

    // buat nama foto baru dengan uniqid
    $uniqId = uniqid();
    $namaFotoBaru = $uniqId ."_". $namaFoto;
    // ambil semua data pada form
    $namaWisata       = htmlspecialchars($_POST["nama_wisata"]);
    $alamatWisata     = htmlspecialchars($_POST["alamat_wisata"]);
    $urlLokasi        = htmlspecialchars($_POST["url_lokasi"]);
    $petaArea         = htmlspecialchars($_POST["peta_area"]);
    $nomorTelepon     = htmlspecialchars($_POST["nomor_telepon"]);
    $jamBuka          = htmlspecialchars($_POST["jam_buka"]);
    $hargaTiketDewasa = htmlspecialchars($_POST["harga_tiket_dewasa"]);
    $hargaTiketAnak   = htmlspecialchars($_POST["harga_tiket_anak"]);
    $idKategoriWisata = htmlspecialchars($_POST["id_kategori_wisata"]);
    $videoYoutube     = htmlspecialchars($_POST["video_youtube"]);
    $facebook         = htmlspecialchars($_POST["facebook"]);
    $twitter          = htmlspecialchars($_POST["twitter"]);
    $instagram        = htmlspecialchars($_POST["instagram"]);
    $youtube          = htmlspecialchars($_POST["youtube"]);
    $deskripsiWisata  = htmlspecialchars($_POST["deskripsi_wisata"]);
    $fotoWisata       = $namaFotoBaru;

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

        // pindahkan foto dari lokasi sementara ke folder tourist-img
        move_uploaded_file($namaLokasi, "dist/img/tour-img/" .$namaFotoBaru);
        // edit data pada tabel wisata dengan data baru yang ada diform
        $conn->query("UPDATE tbl_wisata SET nama_wisata = '$namaWisata', alamat_wisata = '$alamatWisata', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', jam_buka = '$jamBuka', harga_tiket_dewasa = '$hargaTiketDewasa', harga_tiket_anak = '$hargaTiketAnak', id_kategori_wisata = '$idKategoriWisata', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_wisata = '$deskripsiWisata', foto_wisata = '$fotoWisata' WHERE id_wisata = '$idUrl'");

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
                    document.location.href = 'index.php?halaman=edit-wisata&id={$idUrl}';
                })

        </script>";

        die();

      }
     
    }
    else {

      // update data pada tabel wisata dengan data baru yang ada diform
      $conn->query("UPDATE tbl_wisata SET nama_wisata = '$namaWisata', alamat_wisata = '$alamatWisata', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', jam_buka = '$jamBuka', harga_tiket_dewasa = '$hargaTiketDewasa', harga_tiket_anak = '$hargaTiketAnak', id_kategori_wisata = '$idKategoriWisata', video_youtube = '$videoYoutube', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', deskripsi_wisata = '$deskripsiWisata' WHERE id_wisata = '$idUrl'");

    }

    // lokasi foto galeri yg diunggah
    $lokasiFileFoGal   = $_FILES["foto_wisata_galeri"]["tmp_name"];
    // hitung jumlah foto galeri yang dipilih(jika ada)
    $jumlah            = count($_FILES["foto_wisata_galeri"]["name"]);

    // cek jika ada foto galeri yg diunggah
    if($lokasiFileFoGal == [""]) {
      // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
      mysqli_query($conn, "UPDATE tbl_galeri_wisata SET id_kategori_wisata = '$idKategoriWisata', id_wisata = '$idUrl' WHERE id_wisata = '$idUrl' ");

      // tampilkan pesan sukses update data & alihkan kehalaman daftar wisata
      echo "<script>

              Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil diperbarui',
                  showConfirmButton: true
              }).then(() => {
                  document.location.href = 'index.php?halaman=wisata-$katWis';
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

        // perbarui dengan semua foto yang dipilih, dan masukkan ke dalam tabel galeri wisata
        mysqli_query($conn, "UPDATE tbl_galeri_wisata SET id_kategori_wisata = '$idKategoriWisata', id_wisata = '$idUrl', foto_1 = '$foto[0]', foto_2 = '$foto[1]', foto_3 = '$foto[2]', foto_4 = '$foto[3]' WHERE id_wisata = '$idUrl' ");

        // tampilkan pesan sukses update data
        echo "<script>

                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diperbarui',
                    showConfirmButton: true
                }).then(() => {
                    document.location.href = 'index.php?halaman=wisata-$katWis';
                })

        </script>";

      }
      // jika foto yang dipilih kurang dari 4 atau lebih dari 4
      else if($jumlah < 4 || $jumlah > 4) {
        // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
        mysqli_query($conn, "UPDATE tbl_galeri_wisata SET id_kategori_wisata = '$idKategoriWisata', id_wisata = '$idUrl' WHERE id_wisata = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    text: 'Jumlah foto galeri harus 4!',
                    showConfirmButton: true
                })

        </script>";

      }
      // selain itu gagal upload
      else {
        // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
        mysqli_query($conn, "UPDATE tbl_galeri_wisata SET id_kategori_wisata = '$idKategoriWisata', id_wisata = '$idUrl' WHERE id_wisata = '$idUrl' ");

        // pesan gagal menambahkan foto galeri
        echo "<script>

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengunggah foto galeri!',
                    showConfirmButton: true
                })

        </script>";

      }

    }

  }

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Wisata</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Wisata</li>
          <li class="breadcrumb-item active">Edit wisata</li>
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
                  <input type="text" class="form-control" id="nama-wisata" name="nama_wisata" placeholder="Enter nama wisata" value="<?=$pecahDataWisata['nama_wisata']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat-wisata">Alamat wisata</label>
                  <input type="text" class="form-control" id="alamat-wisata" name="alamat_wisata" placeholder="Enter alamat wisata" value="<?=$pecahDataWisata['alamat_wisata']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url-lokasi">Url lokasi</label>
                  <input type="text" class="form-control" id="url-lokasi" name="url_lokasi" placeholder="Enter url lokasi" value="<?=$pecahDataWisata['url_lokasi']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="peta-area">Peta Area</label>
                  <input type="text" class="form-control" id="peta-area" name="peta_area" placeholder="Enter peta area(source peta area)" value="<?=$pecahDataWisata['peta_area']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="harga-tiket-dewasa">Harga tiket (Dewasa)</label>
                  <input type="text" class="form-control" id="harga-tiket-dewasa" name="harga_tiket_dewasa" placeholder="Enter harga tiket dewasa" value="<?=$pecahDataWisata['harga_tiket_dewasa']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="harga-tiket-anak">Harga tiket (Anak)</label>
                  <input type="text" class="form-control" id="harga-tiket-anak" name="harga_tiket_anak" placeholder="Enter harga tiket anak" value="<?=$pecahDataWisata['harga_tiket_anak']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor-telepon">Nomor Telepon</label>
                  <input type="number" class="form-control" id="nomor-telepon" name="nomor_telepon" placeholder="Enter nomor telepon" value="<?=$pecahDataWisata['nomor_telepon']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam-buka">Jam buka</label>
                  <input type="text" class="form-control" id="jam-buka" name="jam_buka" placeholder="Enter jam buka" value="<?=$pecahDataWisata['jam_buka']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter akun facebook" value="<?=$pecahDataWisata['facebook']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter akun twitter" value="<?=$pecahDataWisata['twitter']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter akun instagram" value="<?=$pecahDataWisata['instagram']; ?>" required>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Youtube</label>
                  <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter youtube channel" value="<?=$pecahDataWisata['youtube']; ?>" required>
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
                  <select class="form-control" name="id_kategori_wisata">
                    <option value="<?=$pecahDataWisata['id_kategori_wisata']; ?>"><?=$pecahDataWisata['kategori_wisata']; ?></option>
                    <?php 
                      while($pecahDatKatWis = $ambilDatKatWis->fetch_assoc()) {
                    ?>
                    <option value="<?=$pecahDatKatWis['id_kategori_wisata']; ?>"><?=$pecahDatKatWis['kategori_wisata']; ?></option>
                    <?php } ?>
                  </select>
                </div>

              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="video-youtube">Video Youtube</label>
                  <input type="text" class="form-control" id="video-youtube" name="video_youtube" placeholder="Enter video youtube" value="<?=$pecahDataWisata['video_youtube']; ?>" required>
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
                  <textarea class="form-control" rows="3" name="deskripsi_wisata" placeholder="Enter ..."  required><?=$pecahDataWisata['deskripsi_wisata']; ?></textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-foto">Input foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-foto" name="foto_wisata">
                      <label class="custom-file-label" for="input-foto">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>

                <!-- Foto lama -->
                <div class="form-group">
                  <img src="dist/img/tour-img/<?=$pecahDataWisata['foto_wisata']; ?>" class="" alt="Foto produk lama." width="100%" height="150">
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
            <a href="index.php?halaman=wisata-<?=strtolower($pecahDataWisata['kategori_wisata']); ?>" class="btn btn-secondary">Batal</a>
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
              <label for="kat-wis-gal">Kategori wisata</label>
              <input type="text" class="form-control" id="kat-wis-gal" name="kategori_wisata_galeri" value="<?=$pecahDataWisata['kategori_wisata']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="nam-wis-gal">Nama wisata</label>
              <input type="text" class="form-control" id="nam-wis-gal" name="nama_wisata_galeri" value="<?=$pecahDataWisata['nama_wisata']; ?>" disabled>
            </div>
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

            <?php if(empty($pecahDataWisata['foto_1'])) { ?>
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
                <img class="" src="dist/img/tour-gallery/<?=$pecahDataWisata['foto_1']; ?>" alt="Foto 1" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/tour-gallery/<?=$pecahDataWisata['foto_2']; ?>" alt="Foto 2" width="100%" height="80px">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mb-3">
              <div class="col-sm-6">
                <img class="" src="dist/img/tour-gallery/<?=$pecahDataWisata['foto_3']; ?>" alt="Foto 3" width="100%" height="80px">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <img class="" src="dist/img/tour-gallery/<?=$pecahDataWisata['foto_4']; ?>" alt="Foto 4" width="100%" height="80px">
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