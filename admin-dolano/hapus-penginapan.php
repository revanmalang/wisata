<?php

	// ambil id penginapan yang akan dihapus di url
	$idPenginapan = $_GET['id'];
	// hapus penginapan dari tabel penginapan
	$conn->query("DELETE FROM tbl_penginapan WHERE id_penginapan = '$idPenginapan'");
	// hapus foto galeri penginapan pada tabel galeri penginapan
	$conn->query("DELETE FROM tbl_galeri_penginapan WHERE id_penginapan = '$idPenginapan' ");
	// alihkan halaman ke daftar penginapan
	echo "<script>location ='index.php?halaman=daftar-penginapan';</script>";
	
?>