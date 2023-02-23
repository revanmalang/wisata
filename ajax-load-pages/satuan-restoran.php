<?php 

    // koneksi kedatabase
    require "../admin-dolano/connection/koneksi-database.php";

    // ambil id restoran di url
    $idRestoran = $_GET["id"];

    // ambil satu data restoran dari tabel restoran sesuai id restoran yang dipilih (untuk tampilan di article sidebar [restoran])
    $ambilDataRes = $conn->query("SELECT * FROM tbl_restoran WHERE id_restoran = '$idRestoran' ");

?>


<div class="blog_left_sidebar" id="load-restoran">

    <?php while($pecahDataRes = $ambilDataRes->fetch_assoc()) { ?>
    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="admin-dolano/dist/img/restaurant-img/<?=$pecahDataRes['foto_restoran']; ?>" alt="Foto restoran">
            <a  class="blog_item_date">
                <!-- <h3>15</h3> -->
                <!-- <p>Jan</p> -->
                <i class="fa fa-cutlery fa-3x text-white"></i>
            </a>
        </div>

        <div class="blog_details">
            <a class="d-inline-block" href="detail-restoran.php?id=<?=base64_encode($pecahDataRes['id_restoran']); ?>">
                <h2><?=$pecahDataRes["nama_restoran"]; ?></h2>
            </a>
            <p><?=$pecahDataRes["alamat_restoran"]; ?></p>
            <ul class="blog-info-link">
                <li><a ><i class="fa fa-clock-o" style="color: #ff4a52;"></i> <?=$pecahDataRes["jam_buka"]; ?></a></li>
                <li><a href="<?=$pecahDataRes['url_lokasi']; ?>" target="_blank"><i class="fa fa-map-marker" style="color: #ff4a52;"></i> Lokasi</a></li>
            </ul>
        </div>
    </article>
    <?php } ?>

</div>