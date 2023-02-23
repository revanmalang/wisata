<?php 

    // koneksi ke database 
    require "../unsubs/../admin-dolano/connection/koneksi-database.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dolano | Unsubscribe</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../unsubs/../dist/img/favicon-1.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../unsubs/../admin-dolano/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../unsubs/../admin-dolano/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../unsubs/../admin-dolano/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" id="login-box">
  <div class="login-logo">
    <a href="#"><b>Unsubscribe?</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Kamu sudah yakin ingin berhenti mengikuti kami? Jika ya, silahkan masukkkan email kamu!</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" id="envelope"></span>
            </div>
          </div>
          <span id="invalid-feedback"></span>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-secondary btn-block" name="btn-submit">Unsubscribe</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        Berubah pikiran? Selalu ada jalan kembali. <a href="http://www.dolano.web.id">Batalkan!</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../unsubs/../admin-dolano/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../unsubs/../admin-dolano/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../unsubs/../admin-dolano/dist/js/adminlte.min.js"></script>

<?php 

  // jika tombol submit ditekan
  if(isset($_POST["btn-submit"])) {

    // ambil email user yg unsubscribe
    $email = htmlspecialchars(strtolower($_POST["email"]));
    // ambil email dari tabel subscriber dan cocokkan dengan email yg dimasukkan user diform email
    $ambilEmail = $conn->query("SELECT * FROM tbl_subscriber WHERE email = '$email' ");
    // cek jika email tidak ditemukan/salah
    $adaEmailTdk = $ambilEmail->num_rows;
    if($adaEmailTdk < 1) {
      // alihkan kembali ke halaman konfimr
      echo "<script>$('input#email').addClass('is-invalid');</script>";
      echo "<script>$('span#envelope').addClass('text-danger');</script>";
      echo "<script>$('span#invalid-feedback').text('Email tidak ditemukan');</script>";
      echo "<script>$('span#invalid-feedback').addClass('invalid-feedback');</script>";     
    }
    else {

      $pecahEmail = $ambilEmail->fetch_assoc();

      if($pecahEmail["status"] == "Tidak mengikuti") {
        // alihkan kembali ke halaman konfimr
        echo "<script>$('input#email').val('${email}');</script>";
        echo "<script>$('input#email').addClass('is-valid');</script>";
        echo "<script>$('span#envelope').addClass('text-success');</script>";
        echo "<script>$('span#invalid-feedback').text('Anda sudah berhasil unsubscribe');</script>";
        echo "<script>$('span#invalid-feedback').addClass('valid-feedback');</script>";     
      }
      else {
        // ambil tanggal, jam & tahun sekarang
        $tanggal = date("Y-m-d");
        $jam     = date("H:i:s");
        $tahun   = date("Y");

        // update status subscriber dari mengikuti menjadi tidak mengikuti
        $conn->query("UPDATE tbl_subscriber SET tanggal_keluar = '$tanggal', jam_keluar = '$jam', status = 'Tidak mengikuti' WHERE email = '$email' ");

        // sembunyikan/hilangkan login box
        echo "<script>$('div#login-box').css('display', 'none')</script>";

        // tampilkan pesan sukses unsubscribe
        echo "<div class='row'><div class='col-sm-2'></div><div class='col-sm-8'><div class='card'><div class='card-body'><div class='alert alert-success alert-dismissible'><h5><i class='icon fas fa-check'></i> Unsubscribe Sukses</h5>Terimakasih sudah bersama kami selama ini, maaf atas semua kekurangan kami. Semoga anda sukses.</div> <hr style='width: 80%;'> <div class='text-center'>&copy; ${tahun} | <a href='http://www.dolano.web.id'>dolano.web.id</a></div> </div></div></div></div><div class='col-sm-2'></div>";
      }

    }

  }

?>

</body>
</html>
