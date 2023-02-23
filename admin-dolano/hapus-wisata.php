<?php

	// ambil kategori wisata & id wisata yang akan dihapus pada url
	$katWis   = strtolower($_GET['k']);
	$idWisata = $_GET['id'];
	// hapus wisata dari tabel wisata
	$conn->query("DELETE FROM tbl_wisata WHERE id_wisata = '$idWisata' ");
	// hapus foto galeri wisata pada tabel galeri wisata
	$conn->query("DELETE FROM tbl_galeri_wisata WHERE id_wisata = '$idWisata' ");
	// alihkan halaman ke daftar wisata
	echo "<script>location ='index.php?halaman=wisata-$katWis';</script>";
	
?>