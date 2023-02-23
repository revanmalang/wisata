<?php 

	require "../connection/koneksi-database.php";

	// ambil data dari form
    $namaWisata         = htmlspecialchars($_POST["nama_wisata"]);
    $alamatWisata       = htmlspecialchars($_POST["alamat_wisata"]);
    $urlLokasi          = htmlspecialchars($_POST["url_lokasi"]);
    $petaArea           = htmlspecialchars($_POST["peta_area"]);
    $nomorTelepon       = htmlspecialchars($_POST["nomor_telepon"]);
    $jamBuka            = htmlspecialchars($_POST["jam_buka"]);
    $hargaTiketDewasa   = htmlspecialchars($_POST["harga_tiket_dewasa"]);
    $hargaTiketAnak     = htmlspecialchars($_POST["harga_tiket_anak"]);
    $idKategoriWisata   = htmlspecialchars($_POST["id_kategori_wisata"]);
    $deskripsiWisata    = htmlspecialchars($_POST["deskripsi_wisata"]);
    $fotoWisata         = htmlspecialchars($_POST["foto_wisata"]);


    // ambil id wisata pada url
    $idUrl = $_GET["id"];

    // cek ada tdk data yg akan diupdate
    $getData = $conn->query("SELECT * FROM tbl_wisata WHERE id_wisata = '$idUrl' ");
    $rows = $getData->num_rows;

    // update data pada tabel wisata dengan data baru yang ada diform
    $exeInsert = $conn->query("UPDATE tbl_wisata SET nama_wisata = '$namaWisata', alamat_wisata = '$alamatWisata', url_lokasi = '$urlLokasi', peta_area = '$petaArea', nomor_telepon = '$nomorTelepon', jam_buka = '$jamBuka', harga_tiket_dewasa = '$hargaTiketDewasa', harga_tiket_anak = '$hargaTiketAnak', id_kategori_wisata = '$idKategoriWisata', deskripsi_wisata = '$deskripsiWisata', foto_wisata = '$fotoWisata' WHERE id_wisata = '$idUrl'");

    // buat array kosong
    $response = array();

    // jika sukses insert data baru
    if($rows > 0) {
        if($exeInsert) {
            $response["code"] = 1;
            $response["message"] = "Success! New data is added.";
        }
        else {
            $response["code"] = 0;
            $response["message"] = "Failed update! Something error.";
        }
    }
    else {
        $response["code"] = 0;
        $response["message"] = "Failed update! Not data selected.";
    }

    echo json_encode($response);

?>