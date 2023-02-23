<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

    // ambil data wisata terbaru (3 data saja) 
    $ambilDataWisBaru   = $conn->query("SELECT * FROM tbl_wisata ORDER BY id_wisata DESC LIMIT 3");
    // ambil data restoran terbaru (3 data saja)
    $ambilDataResBaru   = $conn->query("SELECT * FROM tbl_restoran ORDER BY id_restoran DESC LIMIT 3");
    // ambil data penginapan terbaru (3 data saja)
    $ambilDataPengiBaru = $conn->query("SELECT * FROM tbl_penginapan ORDER BY id_penginapan DESC LIMIT 3");

    // ambil data wisata ditabel wisata utk section destinasi wisata (6 data saja)
    $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata ORDER BY id_wisata DESC LIMIT 6");

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
    <title>Dolano | Beranda</title>
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

    <!-- [Link & Embed CSS] My CSS -->
    <link rel="stylesheet" href="dist/css/my-style.css">
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

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Patean</h3>
                                <p>Nikmati keindahan dari atas awan</p>
                                <a href="#destinasi-wisata" class="boxed-btn3">Telusuri Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Weleri</h3>
                                <p>Sunset dipantai utara jawa</p>
                                <a href="#destinasi-wisata" class="boxed-btn3">Telusuri Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Kaliwungu</h3>
                                <p>Wisata religi dengan perpaduan budaya</p>
                                <a href="#destinasi-wisata" class="boxed-btn3">Telusuri Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider_area_end -->

    <!-- logo area -->
    <?php require "components/logo-area.php"; ?>
    
    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Destinasi Terbaru</h3>
                        <p>Anda akan selalu dimanjakan dengan banyak tempat wisata baru yang sedang hits dan populer dikendal, dengan pemandangan indah yang memanjakan mata juga berbagai fasilitasnya.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php while($pecahDataWisBaru = $ambilDataWisBaru->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-12">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="admin-dolano/dist/img/tour-img/<?=$pecahDataWisBaru['foto_wisata']; ?>" alt="Foto wisata" height="230px">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center"><?=$pecahDataWisBaru["nama_wisata"]; ?> <a href="detail-wisata.php?id=<?=base64_encode($pecahDataWisBaru['id_wisata']); ?>"> <i class="fa fa-arrow-right"></i> </a> </p>  
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    <!-- subscribe area -->
    <?php require "components/subscribe-area.php"; ?>

    <!-- destinasi area -->
    <?php require "components/destinasi-wisata.php"; ?>

    <!-- video area -->
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
    <!-- Sweet Alert -->
    <!-- <script src="js/sweet-alert/sweetalert-script.js"></script> -->

    
    <!--contact js-->
    <script src="dist/js/contact.js"></script>
    <script src="dist/js/jquery.ajaxchimp.min.js"></script>
    <script src="dist/js/jquery.form.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/mail-script.js"></script>


    <script src="dist/js/main.js"></script>
    <script src="dist/js/script.js"></script>
    <script>
        
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });

        // load more places
        $("a#btn-loadMorePlaces").on("click", function(e) {
            e.preventDefault();
            $("div#load-more-places").load("ajax-load-pages/semua-wisata.php?key=index");
            $(this).css("display", "none");
        });

    </script>


    <!-- PHP Script -->
    <?php 

        // jika tombol subscribe ditekan
        if(isset($_POST["btn-subscribe"])) {

            // set default timezone
            date_default_timezone_set('Asia/Jakarta');

            // ambil email subscriber
            $email = strtolower(htmlspecialchars($_POST["email"]));
            // cek ada email yang sama tidak
            $ambilEmail = $conn->query("SELECT * FROM tbl_subscriber WHERE email = '$email' "); 
            $adaEmailSamaTdk = $ambilEmail->num_rows;
            if($adaEmailSamaTdk > 0) {
                // jika ada email yg sama, cek dulu statusnya
                // jika statusnya "Mengikuti"
                $status = $ambilEmail->fetch_assoc();
                $statusnya = $status["status"];
                if($statusnya == "Mengikuti") {
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
                // jika statusnya "Tidak mengikuti"
                else if($statusnya == "Tidak mengikuti") {
                    // hapus dahulu data sebelumnya
                    $conn->query("DELETE FROM tbl_subscriber WHERE email = '$email' AND status = 'Tidak mengikuti' ");
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
                // selain dari kondisi itu
                else {
                    // keluar dari program
                    exit();
                }
                
            }
            else {
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