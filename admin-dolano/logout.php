<?php 

	// mulai session
	session_start();
	
	// bersihkan semua session
	session_destroy();

	// hilangkan cookienya
	setcookie("idC", "", time()-3600);
	setcookie("keyC", "", time()-3600);

	// alihkan ke halaman login
	echo "<script>location ='login.php';</script>";
	header("Location: login.php");
	exit();

?>