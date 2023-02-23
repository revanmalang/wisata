<?php 

	require "../connection/koneksi-database.php";

    // ambil id wisata pada url
    $idUrl = $_GET["id"];

    // cek ada tdk data yg akan diupdate
    $getData = $conn->query("SELECT * FROM tbl_wisata WHERE id_wisata = '$idUrl' ");
    $rows = $getData->num_rows;

    // hapus wisata dari tabel wisata
    $exeInsert = $conn->query("DELETE FROM tbl_wisata WHERE id_wisata = '$idUrl' ");

    // buat array kosong
    $response = array();

    // jika sukses insert data baru
    if($rows > 0) {
        if($exeInsert) {
            // hapus foto galeri wisata pada tabel galeri wisata
            $conn->query("DELETE FROM tbl_galeri_wisata WHERE id_wisata = '$idUrl' ");

            $response["code"] = 1;
            $response["message"] = "Deleted Success.";
        }
        else {
            $response["code"] = 0;
            $response["message"] = "Deleted Failed.";
        }
    }
    else {
        $response["code"] = 0;
        $response["message"] = "Failed Delete! Not data selected.";
    }

    echo json_encode($response);

?>