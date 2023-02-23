<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

    // ambil key diurl & cari data disetiap tabel sesuai key tersebut
    $key = $_GET["k"];

    // ambil data pencarian wisata
    $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata WHERE nama_wisata LIKE '%$key%' ");
    // jumlah data yang ditemukan
    $jmlWisata = $ambilDataWis->num_rows;

    // ambil data pencarian restoran
    $ambilDataRes = $conn->query("SELECT * FROM tbl_restoran WHERE nama_restoran LIKE '%$key%' ");
    // jumlah data yang ditemukan
    $jmlRestoran = $ambilDataRes->num_rows;

    // ambil data pencarian penginapan
    $ambilDataPengi = $conn->query("SELECT * FROM tbl_penginapan WHERE nama_penginapan LIKE '%$key%' ");
    // jumlah data yang ditemukan
    $jmlPenginapan = $ambilDataPengi->num_rows;

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
    <title>Dolano | Pencarian</title>
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
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header -->
    <?php require "components/header.php"; ?>

    <!--================Blog Area =================-->
    <section class="blog_area section-padding" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Daftar Wisata</h3>

                            <!-- jika data tidak ada & jika ada -->
                            <?php if($jmlWisata < 1) { ?>
                                <em><h4 style="color: lightgrey;">Tidak ditemukan data..</h4></em>
                            <?php } else { ?>

                                <?php while($pecahDataWis = $ambilDataWis->fetch_assoc()) { ?>
                                <div class="media post_item">
                                    <img src="admin-dolano/dist/img/tour-img/<?=$pecahDataWis['foto_wisata']; ?>" alt="Foto wisata" width="40%" height="80px">
                                    <div class="media-body">
                                        <a href="detail-wisata.php?id=<?=base64_encode($pecahDataWis['id_wisata']); ?>">
                                            <h3><?=$pecahDataWis["nama_wisata"]; ?></h3>
                                        </a>

                                        <div class="days">
                                            <i class="fa fa-map-marker" style="color: #ff4a52;"></i>
                                            <a href="<?=$pecahDataWis['url_lokasi']; ?>">Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            <?php } ?>
                        </aside>

                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Daftar Restoran</h3>

                            <!-- jika data tidak ada & jika ada -->
                            <?php if($jmlRestoran < 1) { ?>
                                <em><h4 style="color: lightgrey;">Tidak ditemukan data..</h4></em>
                            <?php } else { ?>

                                <?php while($pecahDataRes = $ambilDataRes->fetch_assoc()) { ?>
                                <div class="media post_item">
                                    <img src="admin-dolano/dist/img/restaurant-img/<?=$pecahDataRes['foto_restoran']; ?>" alt="Foto restoran" width="40%" height="80px">
                                    <div class="media-body">
                                        <a href="detail-restoran.php?id=<?=base64_encode($pecahDataRes['id_restoran']); ?>">
                                            <h3><?=$pecahDataRes["nama_restoran"]; ?></h3>
                                        </a>

                                        <div class="days">
                                            <i class="fa fa-map-marker" style="color: #ff4a52;"></i>
                                            <a href="<?=$pecahDataRes['url_lokasi']; ?>">Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            <?php } ?>
                        </aside>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Daftar Penginapan</h3>

                            <!-- jika data tidak ada & jika ada -->
                            <?php if($jmlPenginapan < 1) { ?>
                                <em><h4 style="color: lightgrey;">Tidak ditemukan data..</h4></em>
                            <?php } else { ?>

                                <?php while($pecahDataPengi = $ambilDataPengi->fetch_assoc()) { ?>
                                <div class="media post_item">
                                    <img src="admin-dolano/dist/img/penginapan-img/<?=$pecahDataPengi['foto_penginapan']; ?>" alt="Foto penginapan" width="40%" height="80px">
                                    <div class="media-body">
                                        <a href="detail-penginapan.php?id=<?=base64_encode($pecahDataPengi['id_penginapan']); ?>">
                                            <h3><?=$pecahDataPengi["nama_penginapan"]; ?></h3>
                                        </a>

                                        <div class="days">
                                            <i class="fa fa-map-marker" style="color: #ff4a52;"></i>
                                            <a href="<?=$pecahDataPengi['url_lokasi']; ?>">Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            <?php } ?>
                        </aside>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });

        // load data restoran satuan
        $("button#btn-tampilkan").on("click", function(e) {
            const restoran = $("select#select-restoran").val();
            // jika tidak ada yang dipilih
            if(restoran == "0") {
                e.preventDefault();
            }
            else {
                $("div#load-restoran").load("ajax-load-pages/satuan-restoran.php?id=" + restoran);
            }
        });
    </script>
</body>
</html>