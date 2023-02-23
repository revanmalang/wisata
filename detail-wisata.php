<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

    // ambil id wisata yang ada diurl
    $idWisata = base64_decode($_GET["id"]);

    // ambil data wisata pada tabel wisata sesuai id wisata yg dipilih
    $ambilWisata = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_galeri_wisata ON tbl_wisata.id_wisata = tbl_galeri_wisata.id_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata WHERE tbl_wisata.id_wisata = '$idWisata' ");
    $pecahWisata = $ambilWisata->fetch_assoc();

    // cek jika id di url kosong atau bukan angka
    if(empty($idWisata) || !intval($idWisata)) {
        // alihkan ke halaman wisata
        echo "<script>location ='wisata.php';</script>";
        header('Location: wisata.php');
        exit();
    }
    // cek ada data yang dicari tidak
    $adaDataTidak = $ambilWisata->num_rows;
    // jika id yang dicari tidak ada
    if($adaDataTidak < 1) {
        // alihkan ke halaman wisata
        echo "<script>location ='wisata.php';</script>";
        header('Location: wisata.php');
        exit();
    }

    // ambil data wisata ditabel wisata utk section destinasi wisata (3 data saja)
    $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata ORDER BY id_wisata DESC LIMIT 3");

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
    <title>Dolano | Detail Wisata</title>
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

    <div class="destination_banner_wrap overlay" style="background-image: url(admin-dolano/dist/img/tour-img/<?=$pecahWisata['foto_wisata']; ?>);">
        <div class="destination_text text-center">
            <h3><?=$pecahWisata["nama_wisata"]; ?></p></h3>
            <hr style="width: 30%; border: 1px solid #fff;">
        </div>
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info">
                        <h3>Deskripsi</h3>
                        <p class="text-center">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?=$pecahWisata["deskripsi_wisata"]; ?>
                        </p>
                    </div>

                    <div class="destination_info">
                        <h4 class="mb-3">Selengkapnya</h4>
                        <p>
                            <span><strong>Alamat : </strong><?=$pecahWisata["alamat_wisata"]; ?></span><br>

                            <span><strong>Kategori : </strong>Wisata <?=$pecahWisata["kategori_wisata"]; ?></span><br>

                            <span><strong>Jam Buka : </strong><?=$pecahWisata["jam_buka"]; ?></span><br>

                            <span><strong>Harga Tiket Dewasa : </strong>Rp. <?=number_format($pecahWisata["harga_tiket_dewasa"]); ?> ,-</span><br>

                            <span><strong>Harga Tiket Anak : </strong>Rp. <?=number_format($pecahWisata["harga_tiket_anak"]); ?> ,-</span><br>
                            <span><strong>Telepon/(WA) : </strong><?=$pecahWisata["nomor_telepon"]; ?></span>
                        </p>
                    </div>

                    <div class="destination_info">
                        <p class="text-center">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="row">
                                <div class="col-3 text-center ">
                                    <a href="<?=$pecahWisata['facebook']; ?>" target="_blank">
                                        <img src="dist/img/sosmed/facebook.png" alt="Facebook Logo" width="20%">
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?=$pecahWisata['twitter']; ?>" target="_blank">
                                        <img src="dist/img/sosmed/twitter.png" alt="Twitter Logo" width="20%">
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?=$pecahWisata['instagram']; ?>" target="_blank">
                                        <img src="dist/img/sosmed/instagram.png" alt="Instagram Logo" width="20%">
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?=$pecahWisata['youtube']; ?>" target="_blank">
                                        <img src="dist/img/sosmed/youtube-2.png" alt="YouTube Logo" width="20%">
                                    </a>
                                </div>
                            </div>
                        </p>
                    </div>

                    <div class="section-top-border" style="border-top: none;">
                        <h3>Galeri Wisata</h3>
                        <div class="row gallery-item">

                            <!-- jika ada foto galari & jika tidak ada foto galeri -->
                            <?php if($pecahWisata['foto_1'] == "") { ?>

                            <div class="col-12">
                                <em><h4 class="text-secondary text-center mt-5">Foto belum tersedia</h4></em>
                            </div>

                            <?php } else { ?>

                            <div class="col-md-8">
                                <a href="admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_1']; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_1']; ?>);"></div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_2']; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_2']; ?>);"></div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_3']; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_3']; ?>);"></div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_4']; ?>" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url(admin-dolano/dist/img/tour-gallery/<?=$pecahWisata['foto_4']; ?>);"></div>
                                </a>
                            </div>

                            <?php } ?>
                            
                        </div>

                        <div class="row gallery-item mt-4">
                            <div class="col-md-12">

                                <iframe width="100%" height="450" src="<?=$pecahWisata['video_youtube']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
                        </div>
                    </div>

                    <div class="bordered_1px mt-3 pb-5"></div>

                    <div class="map-area">
                    
                        <iframe src="<?=$pecahWisata['peta_area']; ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- subscribe area -->
    <?php require "components/subscribe-area.php"; ?>

    <!-- destinasi area -->
    <?php require "components/destinasi-wisata.php"; ?>

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