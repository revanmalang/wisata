<?php 

    // script pencarian data
    if(isset($_POST["btn-navbar-cari"])) {
        // ambil data dari form pencarian
        $keyword = $_POST["navbar-cari"];
        // header("Location: pencarian-data.php?k=$keyword"); 
        echo "<script>location ='pencarian-data.php?k=$keyword';</script>"; 
    }

?>

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="dist/img/logo-1.png" alt="Logo Dolano">
                                    <!-- <h1 style="color: #ff4a52;">Dolano</h1> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a id="beranda" href="index.php">Beranda</a></li>
                                        <li><a id="tentang" href="tentang.php">Tentang</a></li>
                                        <li><a id="wisata" href="wisata.php">Wisata</a></li>
                                        <li><a id="restoran" href="restoran.php">Retoran</a></li>
                                        <li><a id="penginapan" href="penginapan.php">Penginapan</a></li>
                                        <li><a id="kontak" href="kontak.php">Kontak</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 082257392945</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="https://instagram.com" target="_blank"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="https://twitter.com" target="_blank"> <i class="fa fa-twitter"></i> </a></li>
                                        <li><a href="https://facebook.com" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="https://youtube.com" target="_blank"> <i class="fa fa-youtube-play"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->