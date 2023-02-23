<?php 

    // koneksi kedatabase
    require "admin-dolano/connection/koneksi-database.php";

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
    <title>Dolano | Kontak</title>
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
     <div class="bradcam_area bradcam_bg_5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Kontak</h3>
                        <p>Kami selalu siaga untuk anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-block d-sm-block mb-5 pb-4">
                    <!-- <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                    </div> -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31617.09848972072!2d112.52230405!3d-7.880698749999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887333731fe9f%3A0xea007d403123935!2sBatu%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1677161507949!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    
                </div>
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Berikan saran terbaikmu</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form needs-validation" action="mail/kontak-proses.php" method="post" id="" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100 ajax-response success" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan pesanmu'" placeholder=" Masukkan pesanmu" required autocomplete="off"></textarea>
                                        <div class="valid-feedback">
                                            Valid
                                        </div>
                                        <div class="invalid-feedback">
                                            Invalid!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan namamu'" placeholder="Masukkan namamu" required autocomplete="off">
                                        <div class="valid-feedback">
                                            Valid
                                        </div>
                                        <div class="invalid-feedback">
                                            Invalid!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan alamat email'" placeholder="Masukkan alamat email" required autocomplete="off">
                                        <div class="valid-feedback">
                                            Valid
                                        </div>
                                        <div class="invalid-feedback">
                                            Invalid! (Wajib ada karakter '@')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan subjek'" placeholder="Masukkan subjek" required autocomplete="off">
                                        <div class="valid-feedback">
                                            Valid
                                        </div>
                                        <div class="invalid-feedback">
                                            Invalid!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn" name="" id="">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Batu, Indonesia</h3>
                                <p>Gedung Balaikota Among Tani
                                Jl. Panglima Sudirman No. 507, Kota Batu Kode Pos 65313</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>(0341) 591097</h3>
                                <p>Senin-Jumat Jam 08:00-16:00</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>revanmalang@indonesiancode.party</h3>
                                <p>Kirimkan pesanmu kapanpun!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
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

        <!-- contact validate(via bootstrap[my script]) -->
        <script src="dist/js/contact-validate/contact-validate.js"></script>
    
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
        </script>


        <!-- PHP Script -->
        <?php 

            // jika sukses mengirim pesan
            if(isset($_GET["s"])) {

                if($_GET["s"] == "1") {
                    // pesan berhasil mengirim
                    echo "<script>

                            Swal.fire({
                                icon: 'success',
                                title: 'Pesan terkirim',
                                text: 'Terimakasih atas saran dan komentarnya',
                                showConfirmButton: true
                            })

                    </script>";
                }
                else if($_GET["s"] == "0") {
                    // pesan gagal mengirim
                    echo "<script>

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal mengirim pesan!',
                                text: 'Terjadi kesalahan, silahkan coba lagi!',
                                showConfirmButton: true
                            })

                    </script>";
                }
                else {
                    // alihkan kehalaman kontak
                    header("Location: kontak.php");
                    exit();
                }

            }

        ?>

</body>
    
</html>