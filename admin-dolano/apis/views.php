<?php 

	require "../connection/koneksi-database.php";

	$rows = [];

	$result = $conn->query("SELECT * FROM tbl_wisata");

	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}

	echo json_encode($rows);

?>