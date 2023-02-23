<?php

  // mulai session
  session_start();
  // cek jika sudah ada session admin/sudah login
  if(isset($_SESSION["admin"])) {
    // alihkan kembali kehalaman dashboard
    header("Location: index.php?halaman=dashboard");
    exit();
  }
  // koneksi ke database
  require "connection/koneksi-database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dolano | Log in</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="dist/img/favicon-1.png">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Pace Loading -->
  <link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page pace-primary">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Admin</b>-Dolano</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan login untuk mulai</p>

      <!-- alert danger(username & password) -->
      <div class="alert alert-danger alert-dismissible d-none alert-user-pass">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
        Maaf, coba cek kembali <b>username</b> dan <b>password</b> anda.
      </div>
      <!-- alert danger(username) -->
      <div class="alert alert-danger alert-dismissible d-none alert-user">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
        Maaf, coba cek kembali <b>username</b> anda.
      </div>
      <!-- alert danger(password) -->
      <div class="alert alert-danger alert-dismissible d-none alert-pass">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
        Maaf, coba cek kembali <b>password</b> anda.
      </div>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control username" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember-me">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn-masuk">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- pace-progress -->
<script src="plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- script login admin -->
<?php 

  // jika tombol login/masuk ditekan
  if(isset($_POST["btn-masuk"])) {

    // ambil data admin dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // ambil data username dari tabel admin
    $ambilUsername = $conn->query("SELECT username FROM tbl_admin WHERE username = '$username' ");
    // cek kecocokan data yang masuk
    $dataUsername = $ambilUsername->num_rows;

    // ambil data username dari tabel admin
    $ambilPassword = $conn->query("SELECT password FROM tbl_admin WHERE password = '$password' ");
    // cek kecocokan data yang masuk
    $dataPassword = $ambilPassword->num_rows;
    
    if($dataUsername != 1 && $dataPassword != 1) {
      echo "<script>
          $(document).ready(function() {
            $('.alert-user-pass').removeClass('d-none');
            $('.alert-user-pass').addClass('d-block');
            $('.username,.password').addClass('is-invalid');
            $('span.fa-user,span.fa-lock').addClass('text-danger');
          });
      </script>";
    }
    else if($dataUsername != 1) {
      echo "<script>
          $(document).ready(function() {
            $('.alert-user').removeClass('d-none');
            $('.alert-user').addClass('d-block');
            $('.username').addClass('is-invalid');
            $('span.fa-user').addClass('text-danger');
          });
      </script>";
    }
    else if($dataPassword != 1) {
      echo "<script>
          $(document).ready(function() {
            $('.alert-pass').removeClass('d-none');
            $('.alert-pass').addClass('d-block');
            $('.password').addClass('is-invalid');
            $('span.fa-lock').addClass('text-danger');
          });
      </script>";
    }
    else {
      // ambil semua data admin dari tabel admin
      $ambilDatAdm = $conn->query("SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ");
      $pecahDatAdm = $ambilDatAdm->fetch_assoc();

      // buat session admin dan isikan dengan data admin yang login
      $_SESSION["admin"] = $pecahDatAdm;

      // cek ada cookie tidak
      if(isset($_POST["remember-me"])) {
        // set cookie id admin
        setcookie("idC", $pecahDatAdm["id_admin"], time()+604800 );
        // set cookie username admin
        setcookie("keyC", hash("sha256", $pecahDatAdm["username"]), time()+604800 );
      }

      // alihkan kehalaman dashboard admin
      // header("Location: index.php?halaman=dashboard");
      echo "<script>location ='index.php?halaman=dashboard';</script>";
    }

  }

?>

</body>
</html>
