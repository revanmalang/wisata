<?php 

  // koneksi kedatabase
  require "admin-dolano/connection/koneksi-database.php";

  // ambil id restoran yang ada diurl
  $idRestoran = base64_decode($_GET["id"]);

  // ambil data restoran pada tabel restoran sesuai id restoran yg dipilih
  $ambilRestoran = $conn->query("SELECT * FROM tbl_restoran JOIN tbl_galeri_restoran ON tbl_restoran.id_restoran = tbl_galeri_restoran.id_restoran WHERE tbl_restoran.id_restoran = '$idRestoran' ");
  $pecahRestoran = $ambilRestoran->fetch_assoc();

  // cek jika id di url kosong atau bukan angka
  if(empty($idRestoran) || !intval($idRestoran)) {
      // alihkan ke halaman restoran
      echo "<script>location ='restoran.php';</script>";
      header('Location: restoran.php');
      exit();
  }
  // cek ada data yang dicari tidak
  $adaDataTidak = $ambilRestoran->num_rows;
  // jika id yang dicari tidak ada
  if($adaDataTidak < 1) {
      // alihkan ke halaman restoran
      echo "<script>location ='restoran.php';</script>";
      header('Location: restoran.php');
      exit();
  }

  // ambil data restoran dari tabel restoran (untuk tampilan di aside [kategori] )
  $ambilDataRes = $conn->query("SELECT * FROM tbl_restoran");
  // hitung jumlah restoran (untuk aside kategori)
  $jmlRes = $ambilDataRes->num_rows;

  // ambil data wisata dari tabel wisata (untuk tampilan di aside [kategori] )
  $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata");
  // hitung jumlah wisata (untuk aside kategori)
  $jmlWis = $ambilDataWis->num_rows;

  // ambil data penginapan dari tabel penginapan (untuk tampilan di aside [kategori] )
  $ambilDataPengi = $conn->query("SELECT * FROM tbl_penginapan");
  // hitung jumlah penginapan (untuk aside kategori)
  $jmlPengi = $ambilDataPengi->num_rows;

  // ambil data wisata & kategori wisata dari tabel wisata & kategori wisata (untuk tampilan di aside [wisata] )
  $ambilDataWisKat = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata ORDER BY tbl_wisata.id_wisata DESC LIMIT 4");

  // ambil data wisata populer (4 data saja [footer])
  $ambilWisPop = $conn->query("SELECT * FROM tbl_wisata ORDER BY id_wisata DESC LIMIT 4");

  // ambil data wisata dan foto galeri wisata (6 data saja [footer])
  $ambilFotoGalWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_galeri_wisata ON tbl_wisata.id_wisata = tbl_galeri_wisata.id_wisata ORDER BY tbl_wisata.id_wisata DESC LIMIT 6");

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Dolano | Detail Restoran</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link rel="manifest" href="site.webmanifest"> -->
   <link rel="shortcut icon" type="image/x-icon" href="dist/img/favicon-1.png">
   <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
   <link rel="stylesheet" href="dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="dist/css/owl.carousel.min.css">
   <link rel="stylesheet" href="dist/css/magnific-popup.css">
   <link rel="stylesheet" href="dist/css/font-awesome.min.css">
   <link rel="stylesheet" href="dist/css/themify-icons.css">
   <link rel="stylesheet" href="dist/css/nice-select.css">
   <link rel="stylesheet" href="dist/css/flaticon.css">
   <link rel="stylesheet" href="dist/css/gijgo.css">
   <link rel="stylesheet" href="dist/css/animate.css">
   <link rel="stylesheet" href="dist/css/slicknav.css">
   <!-- Pace Loading -->
   <link rel="stylesheet" href="dist/js/pace-progress/themes/red/pace-theme-minimal.css">

   <link rel="stylesheet" href="dist/css/style.css">
   <!-- <link rel="stylesheet" href="css/responsive.css"> -->

   <!-- [Link & Embed CSS] My CSS -->
    <style>
        div.swal2-select {
            display: none !important;
        }
    </style>

    <!-- Sweet Alert2 -->
    <script src="dist/js/sweet-alert/sweet-alert2/sweetalert2.all.min.js"></script>
</head>

<body>
   <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header -->
    <?php require "components/header.php"; ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_4" style="background-image: url(admin-dolano/dist/img/restaurant-img/<?=$pecahRestoran['foto_restoran']; ?>);">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3><?=$pecahRestoran["nama_restoran"]; ?></h3>
                      <hr style="width: 30%; border: 1px solid #fff;">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

  <!--================Blog Area =================-->
  <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                  <div class="feature-img">
                     <h3>Deskripsi</h3>
                  </div>
                  <div class="blog_details">
                     <p class="excert">
                        <?=$pecahRestoran["deskripsi_restoran"]; ?>
                     </p>
                  </div>

                  <div class="feature-img">
                     <h4>Selengkapnya</h4>
                  </div>
                  <div class="blog_details pt-2">
                     <p class="excert">

                      <span><strong>Alamat : </strong><?=$pecahRestoran["alamat_restoran"]; ?></span><br>

                      <span><strong>Jam Buka : </strong><?=$pecahRestoran["jam_buka"]; ?></span><br>
                      <span><strong>Telepon/(WA) : </strong><?=$pecahRestoran["nomor_telepon"]; ?></span>

                     </p>
                  </div>

                  <div class="blog_details">
                    <p class="excert">
                      <div class="row">
                        <div class="col-3 text-center ">
                            <a href="<?=$pecahRestoran['facebook']; ?>" target="_blank">
                                <img src="dist/img/sosmed/facebook.png" alt="Facebook Logo" width="20%">
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="<?=$pecahRestoran['twitter']; ?>" target="_blank">
                                <img src="dist/img/sosmed/twitter.png" alt="Twitter Logo" width="20%">
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="<?=$pecahRestoran['instagram']; ?>" target="_blank">
                                <img src="dist/img/sosmed/instagram.png" alt="Instagram Logo" width="20%">
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="<?=$pecahRestoran['youtube']; ?>" target="_blank">
                                <img src="dist/img/sosmed/youtube-2.png" alt="YouTube Logo" width="20%">
                            </a>
                        </div>
                      </div>
                    </p>
                  </div>
                </div>
               
                <div class="comment-form" style="border-top: none;">
                  <h3>Galeri Restoran</h3>
                  <div class="row gallery-item">

                    <!-- jika ada foto galari & jika tidak ada foto galeri -->
                    <?php if($pecahRestoran['foto_1'] == "") { ?>

                    <div class="col-12">
                        <em><h4 class="text-secondary text-center mt-5">Foto belum tersedia</h4></em>
                    </div>

                    <?php } else { ?>

                    <div class="col-md-8">
                        <a href="admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_1']; ?>" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_1']; ?>);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_2']; ?>" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_2']; ?>);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_3']; ?>" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_3']; ?>);"></div>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a href="admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_4']; ?>" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/restaurant-gallery/<?=$pecahRestoran['foto_4']; ?>);"></div>
                        </a>
                    </div>

                    <?php } ?>
                    
                  </div>

                  <div class="row gallery-item mt-4">
                    <div class="col-md-12">

                      <iframe width="100%" height="450" src="<?=$pecahRestoran['video_youtube']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>
                  </div>
                  
                </div>

                <hr class="mt-5 pb-3">

                <div class="map-area">
                
                    <iframe src="<?=$pecahRestoran['peta_area']; ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>

            </div>

            <div class="col-lg-4">
               <div class="blog_right_sidebar">

                  <!-- kategori area aside -->
                  <?php require "components/kategori-area-aside.php"; ?>
                  
                  <!-- wisata area aside -->
                  <?php require "components/wisata-area-aside.php"; ?>
                  
                  <!-- subscribe area aside -->
                  <?php require "components/subscribe-area-aside.php"; ?>

               </div>
            </div>
         </div>
      </div>
  </section>
  <!--================ Blog Area end =================-->

  <!-- footer -->
  <?php require "components/footer.php"; ?>

  <!-- modal pencarian -->
  <?php require "components/modal-pencarian.php"; ?>

   <!-- JS here -->
   <script src="dist/js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="dist/js/vendor/jquery-1.12.4.min.js"></script>
   <script src="dist/js/popper.min.js"></script>
   <script src="dist/js/bootstrap.min.js"></script>
   <script src="dist/js/owl.carousel.min.js"></script>
   <script src="dist/js/isotope.pkgd.min.js"></script>
   <script src="dist/js/ajax-form.js"></script>
   <script src="dist/js/waypoints.min.js"></script>
   <script src="dist/js/jquery.counterup.min.js"></script>
   <script src="dist/js/imagesloaded.pkgd.min.js"></script>
   <script src="dist/js/scrollIt.js"></script>
   <script src="dist/js/jquery.scrollUp.min.js"></script>
   <script src="dist/js/wow.min.js"></script>
   <script src="dist/js/nice-select.min.js"></script>
   <script src="dist/js/jquery.slicknav.min.js"></script>
   <script src="dist/js/jquery.magnific-popup.min.js"></script>
   <script src="dist/js/plugins.js"></script>
   <script src="dist/js/gijgo.min.js"></script>
   <!-- pace-progress -->
   <script src="dist/js/pace-progress/pace.min.js"></script>

   <!--contact js-->
   <script src="dist/js/contact.js"></script>
   <script src="dist/js/jquery.ajaxchimp.min.js"></script>
   <script src="dist/js/jquery.form.js"></script>
   <script src="dist/js/jquery.validate.min.js"></script>
   <script src="dist/js/mail-script.js"></script>

   <script src="dist/js/main.js"></script>


    <!-- PHP Script -->
    <?php 

        // jika tombol subscribe ditekan
        if(isset($_POST["btn-subscribe"])) {

            // ambil email subscriber
            $email = strtolower(htmlspecialchars($_POST["email"]));
            // cek ada email yang sama tidak
            $ambilEmail = $conn->query("SELECT * FROM tbl_subscriber WHERE email = '$email' "); 
            $adaEmailSamaTdk = $ambilEmail->num_rows;
            if($adaEmailSamaTdk > 0) {
                // pesan gagal
                echo "<script>
    
                        Swal.fire({
                            icon: 'info',
                            title: 'Perhatian!',
                            text: 'Email sudah digunakan',
                            showConfirmButton: true
                        })

                </script>";

            }
            else {
                // set default timezone
                date_default_timezone_set('Asia/Jakarta');
                // buat tanggal dan jam sekarang (waktu saat bergabung)
                $tanggal = date("Y-m-d");
                $jam = date("H:i:s");
                // simpan data subscriber kedalam tabel subscriber
                $conn->query("INSERT INTO tbl_subscriber (email, tanggal_gabung, jam_gabung, tanggal_keluar, jam_keluar) VALUES ('$email', '$tanggal', '$jam', '0000-00-00', '00:00:00') ");
                // pesan berhasil
                echo "<script>
    
                        Swal.fire({
                            icon: 'success',
                            title: 'Subscribe berhasil',
                            text: 'Terimakasih sudah subscribe',
                            showConfirmButton: true
                        })

                </script>";
                
            }

        }

    ?>

</body>

</html>