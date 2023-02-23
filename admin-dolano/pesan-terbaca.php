<?php 

	// menghubungkan dengan file koneksi database
  	require 'connection/koneksi-database.php';

  	// ambil data yang dikirim
  	$statusPesan = $_POST["statusPesan"];

  	// jika status pesannya terbaca
  	if($statusPesan != "") {
  		// update status pesan pada tabel subscriber
  		$conn->query("UPDATE tbl_subscriber SET status_pesan = '$statusPesan' ");
  	}
  	else {
  		// alihkan kehalaman subscriber
  		header("Location: index.php?halaman=subscriber");
  		exit();
  	}

?>