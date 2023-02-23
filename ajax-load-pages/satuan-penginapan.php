<?php 

    // koneksi kedatabase
    require "../admin-dolano/connection/koneksi-database.php";

    // ambil id penginapan di url
    $idPenginapan = $_GET["id"];

    // ambil satu data penginapan dari tabel penginapan sesuai id penginapan yang dipilih (untuk tampilan di article sidebar [penginapan])
    $ambilDataPengi = $conn->query("SELECT * FROM tbl_penginapan WHERE id_penginapan = '$idPenginapan' ");

?>


<div class="blog_left_sidebar" id="load-penginapan">

    <?php while($pecahDataPengi = $ambilDataPengi->fetch_assoc()) { ?>
    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="admin-dolano/dist/img/penginapan-img/<?=$pecahDataPengi['foto_penginapan']; ?>" alt="Foto penginapan">
            <a  class="blog_item_date">
                <i class="fa fa-bed fa-3x text-white"></i>
            </a>
        </div>

        <div class="blog_details">
            <a class="d-inline-block" href="detail-penginapan.php?id=<?=base64_encode($pecahDataPengi['id_penginapan']); ?>">
                <h2><?=$pecahDataPengi["nama_penginapan"]; ?></h2>
            </a>
            <p><?=$pecahDataPengi["alamat_penginapan"]; ?></p>
            <ul class="blog-info-link">
                <li><a href="<?=$pecahDataPengi['url_lokasi']; ?>" target="_blank"><i class="fa fa-map-marker" style="color: #ff4a52;"></i> Lokasi</a></li>
            </ul>
        </div>
    </article>
    <?php } ?>

</div>