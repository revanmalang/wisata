<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Restoran & Penginapan</h3>
                </div>
            </div>
        </div>
        <div class="row">

            <?php while($pecahDataResBaru = $ambilDataResBaru->fetch_assoc()) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="admin-dolano/dist/img/restaurant-img/<?=$pecahDataResBaru['foto_restoran']; ?>" alt="Foto restoran" height="200px">
                    </div>
                    <div class="info">
                        <div class="date">
                            <a href="<?=$pecahDataResBaru['url_lokasi']; ?>" target="_blank"><span><i class="fa fa-map-marker" style="color: #ff4a52;"></i> Lokasi</span></a>
                        </div>
                        <a href="detail-restoran.php?id=<?=base64_encode($pecahDataResBaru['id_restoran']); ?>">
                            <h3><?=$pecahDataResBaru["nama_restoran"]; ?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php while($pecahDataPengiBaru = $ambilDataPengiBaru->fetch_assoc()) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="admin-dolano/dist/img/penginapan-img/<?=$pecahDataPengiBaru['foto_penginapan']; ?>" alt="Foto penginapan" height="200px">
                    </div>
                    <div class="info">
                        <div class="date">
                            <a href="<?=$pecahDataPengiBaru['url_lokasi']; ?>" target="_blank"><span><i class="fa fa-map-marker" style="color: #ff4a52;"></i> Lokasi</span></a>
                        </div>
                        <a href="detail-penginapan.php?id=<?=base64_encode($pecahDataPengiBaru['id_penginapan']); ?>">
                            <h3><?=$pecahDataPengiBaru["nama_penginapan"]; ?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        
        </div>
    </div>
</div>