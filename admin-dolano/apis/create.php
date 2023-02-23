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

    // masukkan data wisata baru ke dalam tabel wisata
    $exeInsert = $conn->query("INSERT INTO tbl_wisata (nama_wisata, alamat_wisata, url_lokasi, peta_area, nomor_telepon, jam_buka, harga_tiket_dewasa, harga_tiket_anak, id_kategori_wisata, deskripsi_wisata, foto_wisata) VALUES ('$namaWisata', '$alamatWisata', '$urlLokasi', '$petaArea', '$nomorTelepon', '$jamBuka', '$hargaTiketDewasa', '$hargaTiketAnak', '$idKategoriWisata', '$deskripsiWisata', '$fotoWisata') ");

    // ambil id wisata yg baru diinputkan ke tabel wisata
    $idWisataBarusan = $conn->insert_id;

    // masukkan data ke dalam tabel galeri wisata tanpa memasukkan foto wisata galeri
    mysqli_query($conn, "INSERT INTO tbl_galeri_wisata (id_kategori_wisata, id_wisata) VALUES ('$idKategoriWisata', '$idWisataBarusan')");

    // buat array kosong
    $response = array();

    // jika sukses insert data baru
    if($exeInsert) {
    	$response["code"] = 1;
    	$response["message"] = "Success! New data is added.";
    }
    else {
    	$response["code"] = 0;
    	$response["message"] = "Failed! Something error.";
    }

    echo json_encode($response);

?>