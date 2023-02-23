<div class="popular_places_area" id="destinasi-wisata">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Destinasi Wisata</h3>
                    <p>Berikut ini adalah daftar destinasi wisata dikendal yang layak anda coba, rasakan pengalamannya dan ceritakan pengalaman anda.</p>
                </div>
            </div>
        </div>
        <div class="row" id="load-more-places">

            <?php while($pecahDataWis = $ambilDataWis->fetch_assoc()) { ?>
            <div class="col-lg-4 col-md-12">
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
                    <a href="" class="boxed-btn4 text-white" id="btn-loadMorePlaces">Tampilkan Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>