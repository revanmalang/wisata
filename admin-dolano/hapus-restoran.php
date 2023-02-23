<?php

	// ambil id restoran yang akan dihapus di url
	$idRestoran = $_GET['id'];
	// hapus restoran dari tabel restoran
	$conn->query("DELETE FROM tbl_restoran WHERE id_restoran = '$idRestoran'");
	// hapus foto galeri restoran pada tabel galeri restoran
	$conn->query("DELETE FROM tbl_galeri_restoran WHERE id_restoran = '$idRestoran' ");
	// alihkan halaman ke daftar restoran
	echo "<script>location ='index.php?halaman=daftar-restoran';</script>";
	
?>