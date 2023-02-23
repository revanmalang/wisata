<?php   

    // ambil id wisata diurl
    $idWisata = $_GET["id"];
    $idWisEncode = base64_encode($idWisata);
    // ambil data subscriber dari tabel subscriber
    $ambilDataSubs = $conn->query("SELECT * FROM tbl_subscriber WHERE status = 'Mengikuti' ");
    // ambil data wisata & kategori wisata dari tabel wisata & tabel kategori wisata
    $ambilDataWis = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata WHERE tbl_wisata.id_wisata = '$idWisata' ");
    $pecahDataWis = $ambilDataWis->fetch_assoc();
    // ambil foto wisata
    $fotoWisata = $pecahDataWis["foto_wisata"];
    $katWisata = strtolower($pecahDataWis["kategori_wisata"]);

    // panggil fungsi date untuk menampilkan tahun
    $tahun = date("Y");
    
?>
    

<?php 

    $bodyMail = "<div style='max-width: 100%; border: 1px solid white; border-radius: 5px; box-shadow: 1px 1px 4px lightgrey; padding: 2px 5px 2px 5px; margin: auto; font-family: arial; text-align: center;'><div style='width: 100%; margin-bottom: 2px;'><h1>{$pecahDataWis['nama_wisata']}</h1></div><div style='width: 100%; margin-bottom: 2px;'><img src='http://www.dolano.web.id/admin-dolano/dist/img/tour-img/{$fotoWisata}' alt='Foto wisata.' style='max-width: 100%;'></div><div style='width: 100%; margin-bottom: 2px;'><h3>Haii Sobat Dolano</h3></div><div style='width: 100%; margin-bottom: 2px;'><p>Bagaimana kabarmu hari ini sob? Semoga sehat selalu yaa. Oh ya, kali ini mimin update lagi ni info seputar pariwisata dikendal, kali ini ada yang baru yaitu <b>Wisata {$pecahDataWis['kategori_wisata']} {$pecahDataWis['nama_wisata']}</b>. Kepoin yukk!!</p></div><div style='width: 100%; margin-bottom: 30px;'><div><p style='margin-bottom: 25px;'>Simak selengkapnya dengan klik tombol dibawah!</p></div><div><a href='http://www.dolano.web.id/detail-wisata.php?id=$idWisEncode' target='_blank' style='text-decoration: none; color: white; width: 100%; border: 1px solid transparent; border-radius: 5px; outline: none; background-color: red; padding: 10px 20px 10px 20px; font-weight: bolder; font-size: 16px;'>TEMUKAN</a></div></div><hr style='border: 1px solid lightgrey; width: 80%;'><div style='width: 100%;'><p>Klik link dibawah untuk unsubscribe:</p><a href='http://www.dolano.web.id/mail/unsubscribe.php?konfirm=unsubs' target='_blank'>Unsubscribe</a></div><div style='width: 100%; margin-bottom: 40px;'><p>Kami selalu ada di:</p><a href='http://www.dolano.web.id' target='_blank'>dolano.web.id</a><p>&copy; ${tahun}</p></div></div>";

    // echo $bodyMail;

?>


<?php

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    require 'src/Exception.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;         // SMTP::DEBUG_SERVER         // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'mail.dolano.web.id';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dolanowe';        // SMTP username
        $mail->Password   = 'B!)Ylt9v7S5Tx7';                          // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_STARTTLS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above

        //Recipients
        $mail->setFrom('dolanowe@dolano.web.id', 'Admin Dolano');

        while($pecahDataSubs = $ambilDataSubs->fetch_assoc()) {
            $mail->addAddress($pecahDataSubs['email'], 'Sobat Dolano');
        }

        $mail->addReplyTo('revanmalang584@indonesiancode.party', 'Informasi');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Hallo Sobat.. Ada yang baru diwisata kendal nih!!';
        $mail->Body    = $bodyMail;

        $mail->send();

        echo "<script>location ='index.php?halaman=wisata-{$katWisata}&s=1'</script>";

    } catch (Exception $e) {

        $errorInfo = $mail->ErrorInfo;
        $errorInfo = base64_encode($errorInfo);
        echo "<script>location ='index.php?halaman=wisata-{$katWisata}&s=0&err={$errorInfo}'</script>";
        
    }

?>
