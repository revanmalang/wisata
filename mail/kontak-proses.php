<?php   

    // jika belum ada data yang dikirim
    if($_POST["name"] == "" && $_POST["subject"] == "" && $_POST["email"] == "" && $_POST["message"] == "") {
        // echo "Maaf, akses anda ilegal!";

        // header("Location: ../kontak.php");
        echo "<script>location ='../kontak.php';</script>";
        exit();
    }

    // ambil semua data pesan yang dikirimkan
    $namaPengirim   = $_POST["name"];
    $subjekPengirim = $_POST["subject"];
    $emailPengirim  = $_POST["email"];
    $pesanPengirim  = $_POST["message"];
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengirim...</title>

    <!-- [Link & Embed CSS] My CSS -->
    <!-- <style>
        div.swal2-select {
            display: none !important;
        }
    </style> -->

    <!-- Sweet Alert2 -->
    <!-- <script src="../js/sweet-alert/sweet-alert2/sweetalert2.all.min.js"></script> -->
</head>
<body>

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
            $mail->setFrom($emailPengirim, $namaPengirim.' - Sobat Dolano');

            $mail->addAddress('revanmalang584@indonesiancode.party', 'Admin Dolano');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subjekPengirim;
            $mail->Body    = $pesanPengirim;


            $mail->send();

            // alihkan kembali kehalaman kontak
            // header("Location: ../kontak.php?s=1");
            echo "<script>location ='../kontak.php?s=1';</script>";
            exit();

            // echo "<script>console.log('Success sent!')</script> ";

        } catch (Exception $e) {

            // alihkan kembali kehalaman kontak
            // header("Location: ../kontak.php?s=0");
            echo "<script>location ='../kontak.php?s=0';</script>";
            exit();

            // echo "<script>console.log('Mailer Error: {$mail->ErrorInfo}')</script> ";

        }

    ?>
    
</body>
</html>
