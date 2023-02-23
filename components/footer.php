<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 ">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="index.php">
                                <img src="dist/img/logo-1.png" alt="Logo Dolano">
                            </a>
                        </div>
                        <p>Batu, Indonesia  Gedung Balaikota Among Tani
                                Jl. Panglima Sudirman No. 507, Kota Batu Kode Pos 65313 <br>
                            <a href="tel:+62294384464">(0294)384464</a> <br>
                            <a href="mailto:revanmalang584@indonesiancode.party">revanmalang584@indonesiancode.party</a>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://facebook.com" target="_blank">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com" target="_blank">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://youtube.com" target="_blank">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Laman
                        </h3>
                        <ul class="links">
                            <li><a href="index.php">Beranda</a></li>
                            <li><a href="tentang.php">Tentang</a></li>
                            <li><a href="wisata.php">Wisata</a></li>
                            <li><a href="restoran.php">Restoran</a></li>
                            <li><a href="penginapan.php">Penginapan</a></li>
                            <li><a href="kontak.php">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Destinasi Populer
                        </h3>
                        <ul class="links ">

                            <?php foreach($ambilWisPop as $pecahWisPop) { ?>
                            <li><a href="detail-wisata.php?id=<?=base64_encode($pecahWisPop['id_wisata']); ?>"><?=$pecahWisPop["nama_wisata"]; ?></a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Galeri Wisata
                        </h3>
                        <div class="instagram_feed">

                            <?php foreach($ambilFotoGalWis as $pecahFotoGalWis) { ?>
                            <div class="single_insta">
                                <a href="detail-wisata.php?id=<?=base64_encode($pecahFotoGalWis['id_wisata']); ?>">
                                    <img src="admin-dolano/dist/img/tour-gallery/<?=$pecahFotoGalWis['foto_1']; ?>" alt="Foto galeri wisata" height="60px">
                                </a>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Pariwisata Batu <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="http://www.dolano.web.id" target="_blank">Dolano</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>