<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

    // ambil total semua wisata
    $ambilSemuaWis = $conn->query("SELECT * FROM tbl_wisata");
    $jmlWis = $ambilSemuaWis->num_rows;

    // ambil total semua restoran
    $ambilSemuaRes = $conn->query("SELECT * FROM tbl_restoran");
    $jmlRes = $ambilSemuaRes->num_rows;

    // ambil total semua penginapan
    $ambilSemuaPengi = $conn->query("SELECT * FROM tbl_penginapan");
    $jmlPengi = $ambilSemuaPengi->num_rows;

    // ambil data restoran terbaru (3 data saja)
    $ambilDataResBaru   = $conn->query("SELECT * FROM tbl_restoran ORDER BY id_restoran DESC LIMIT 3");

    // ambil data penginapan terbaru (3 data saja)
    $ambilDataPengiBaru = $conn->query("SELECT * FROM tbl_penginapan ORDER BY id_penginapan DESC LIMIT 3");

    // ambil data wisata populer (4 data saja)
    $ambilWisPop = $conn->query("SELECT * FROM tbl_wisata ORDER BY id_wisata DESC LIMIT 4");

    // ambil data wisata dan foto galeri wisata
    $ambilFotoGalWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_galeri_wisata ON tbl_wisata.id_wisata = tbl_galeri_wisata.id_wisata ORDER BY tbl_wisata.id_wisata DESC LIMIT 6");

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dolano | Tentang</title>
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
    <link rel="stylesheet" href="dist/css/slick.css">
    <link rel="stylesheet" href="dist/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- Pace Loading -->
    <link rel="stylesheet" href="dist/js/pace-progress/themes/red/pace-theme-minimal.css">

    <link rel="stylesheet" href="dist/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header -->
    <?php require "components/header.php"; ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Tentang Kami</h3>
                        <p>Sempurnakan petualanganmu dengan kami</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    
    <div class="about_story">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="story_heading">
                        <h3>Siapa Kami?</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 offset-lg-1">
                            <div class="story_info">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p>Kami adalah penyedia layanan informasi seputar pariwisata dikabupaten kendal jawa tengah indonesia, kami selaku media yang selalu update dan konsisten dengan pelayanan informasi yang kami sajikan, terutama yang berkaitan dengan pariwisata dikendal ini. Kami juga tidak berhenti disitu, selain menyediakan informasi pariwisata kami juga menyediakan informasi seputar tempat kuliner dan tempat penginapan yang ada dikendal.</p>
                                <p>Upaya kami dalam mendukung program pemerintah dalam mempromosikan tempat-tempat wisata dikendal ini diharapkan dapat mendongkrak pariwisata dikendal agar kota kendal lebih banyak dikunjungi banyak wisatawan dari berbagai daerah. Kami selalu berusaha meningkatkan kualitas pelayanan kami, dan kami tidak dapat melakukannya tanpa bantuan anda.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="story_thumb">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="thumb padd_1">
                                            <img src="dist/img/about/bupati-1.jpg" alt="Gambar Bupati Batu">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="thumb">
                                            <img src="dist/img/about/wakil-bupati-1.jpg" alt="Gambar Wakil Bupati Batu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="counter_wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3  class="counter"><?=$jmlWis; ?></h3>
                                            <p>Keseluruhan wisata</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter"><?=$jmlRes; ?></h3>
                                            <p>Restoran yang tersedia</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter"><?=$jmlPengi; ?></h3>
                                            <p>Total penginapan dikendal</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- video araa -->
    <?php require "components/video-area.php"; ?>

    <!-- travel variasi area -->
    <?php require "components/travel-variation-area.php"; ?>

    <!-- testimonial area -->
    <?php require "components/testimonial-area.php"; ?>

    <!-- restoran dan penginapan area -->
    <?php require "components/resto-pengi-area.php"; ?>

    <!-- footer -->
    <?php require "components/footer.php"; ?>

    <!-- modal pencarian -->
    <?php require "components/modal-pencarian.php"; ?>

    <!-- link that opens popup -->
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
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
    <script src="dist/js/slick.min.js"></script>
    <!-- pace-progress -->
    <script src="dist/js/pace-progress/pace.min.js"></script>

    
    <!--contact js-->
    <script src="dist/js/contact.js"></script>
    <script src="dist/js/jquery.ajaxchimp.min.js"></script>
    <script src="dist/js/jquery.form.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/mail-script.js"></script>


    <script src="dist/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
    </script>
</body>

</html>