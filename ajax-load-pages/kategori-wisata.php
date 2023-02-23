<?php 

	// koneksi ke database
	require "../admin-dolano/connection/koneksi-database.php";

	// ambil id kategori wisata dari url
	$idKatWis = $_GET["id"];

	// ambil semua data wisata pada tabel wisata
	$ambilDataWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata WHERE tbl_wisata.id_kategori_wisata = '$idKatWis' ORDER BY id_wisata DESC");

?>

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
	                    <i class="fa fa-map-marker" style="color: red;"></i>
	                    <a href="<?=$pecahDataWis['url_lokasi']; ?>" target="_blank">Lokasi</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php } ?>

</div>