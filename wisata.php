<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

    // ambil data kategori wisata untuk value select kategori
    $ambilKatWis = $conn->query("SELECT * FROM tbl_kategori_wisata");

    // ambil data wisata ditabel wisata utk section destinasi wisata (6 data saja)
    $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata ORDER BY id_wisata DESC LIMIT 4");

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
    <title>Dolano | Wisata</title>
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
    <link rel="stylesheet" href="dist/css/jquery-ui.css">
    <link rel="stylesheet" href="dist/css/gijgo.css">
    <link rel="stylesheet" href="dist/css/animate.css">
    <link rel="stylesheet" href="dist/css/slick.css">
    <link rel="stylesheet" href="dist/css/slicknav.css">
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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destinasi</h3>
                        <p>Rasakan pengalamannya hanya disini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- logo area -->
    <?php require "components/logo-area.php"; ?>

    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="filter_result_wrap">
                        <h3>Tampilkan Berdasarkan Kategori</h3>
                        <div class="filter_bordered">
                            <div class="filter_inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <select id="select-kategori">
                                                <option value="0">Kategori</option>
                                                <?php 
                                                    while($pecahKatWis = $ambilKatWis->fetch_assoc()) {
                                                ?>
                                                <option value="<?=$pecahKatWis['id_kategori_wisata']; ?>">Wisata <?=$pecahKatWis["kategori_wisata"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="range_slider_wrap">
                                            <span class="range">Prise range</span>
                                            <div id="slider-range"></div>
                                            <p>
                                                <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-weight:400;">
                                            </p>
                                        </div>
                                    </div> -->
                                </div>


                            </div>

                            <div class="reset_btn">
                                <button class="boxed-btn4" type="submit" id="btn-tampilkan">Tampilkan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row" id="load-more-places">

                        <?php while($pecahDataWis = $ambilDataWis->fetch_assoc()) { ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <img src="admin-dolano/dist/img/tour-img/<?=$pecahDataWis['foto_wisata']; ?>" alt="Foto wisata" height="200px">
                                    <a class="prise">Wisata <?=$pecahDataWis["kategori_wisata"]; ?></a>
                                </div>
                                <div class="place_info">
                                    <a href="detail-wisata.php?id=<?=base64_encode($pecahDataWis['id_wisata']); ?>"><h3><?=$pecahDataWis["nama_wisata"]; ?></h3></a>
                                    <p><?=$pecahDataWis["alamat_wisata"]; ?></p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <i class="fa fa-clock-o"></i>
                                            <a ><?=$pecahDataWis["jam_buka"]; ?></a>
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-map-marker" style="color: #ff4a52;"></i>
                                            <a href="<?=$pecahDataWis['url_lokasi']; ?>" target="_blank">Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <a class="boxed-btn4" href="" id="btn-loadMorePlaces">Tampilkan Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- subscribe area -->
    <?php require "components/subscribe-area.php"; ?>

    <!-- restoran dan penginapan area -->
    <?php require "components/resto-pengi-area.php"; ?>

    <!-- footer -->
    <?php require "components/footer.php"; ?>

    <!-- modal pencarian -->
    <?php require "components/modal-pencarian.php"; ?>
    
    <!-- link that opens popup -->
    

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
    <script src="dist/js/jquery-ui.min.js"> </script>
    <script src="dist/js/nice-select.min.js"></script>
    <script src="dist/js/jquery.slicknav.min.js"></script>
    <script src="dist/js/jquery.magnific-popup.min.js"></script>
    <script src="dist/js/plugins.js"></script>
    <script src="dist/js/range.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
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

        // load kategori wisata
        $("button#btn-tampilkan").on("click", function(e) {
            const kategori = $("select#select-kategori").val();
            if(kategori == "0") {
                e.preventDefault();
            }
            else {
                $("div#load-more-places").load("ajax-load-pages/kategori-wisata.php?id=" + kategori);
                $("a#btn-loadMorePlaces").css("display", "none");
            }
        });

        // load more places
        $("a#btn-loadMorePlaces").on("click", function(e) {
            e.preventDefault();
            $("div#load-more-places").load("ajax-load-pages/semua-wisata.php?key=wisata");
            $(this).css("display", "none");
        }); 
        
    </script>


    <!-- PHP Script -->
    <?php 

        // jika tombol subscribe ditekan
        if(isset($_POST["btn-subscribe"])) {

            // ambil email subscriber, dan 
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