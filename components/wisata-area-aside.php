<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Wisata</h3>

    <?php while($pecahDataWisKat = $ambilDataWisKat->fetch_assoc()) { ?>
    <div class="media post_item">
        <img src="admin-dolano/dist/img/tour-img/<?=$pecahDataWisKat['foto_wisata']; ?>" alt="Foto wisata" width="35%" height="80px">
        <div class="media-body">
            <a href="detail-wisata.php?id=<?=base64_encode($pecahDataWisKat['id_wisata']); ?>">
                <h3><?=$pecahDataWisKat["nama_wisata"]; ?></h3>
            </a>
            <p><?=$pecahDataWisKat["kategori_wisata"]; ?></p>
        </div>
    </div>
    <?php } ?>
</aside>