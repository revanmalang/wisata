<?php require "header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
        <?php
        
          if(isset($_GET["halaman"])) {

            if($_GET["halaman"] == "dashboard") {
              require "dashboard.php";
            }
            else if($_GET["halaman"] == "wisata-pegunungan") {
              require "wisata-pegunungan.php";
            }
            else if($_GET["halaman"] == "wisata-air") {
              require "wisata-air.php";
            }
            else if($_GET["halaman"] == "wisata-religi") {
              require "wisata-religi.php";
            }
            else if($_GET["halaman"] == "tambah-wisata") {
              require "tambah-wisata.php";
            }
            else if($_GET["halaman"] == "wisata-mail") {
              require "mail/kirim-info-wisata.php";
            }
            else if($_GET["halaman"] == "daftar-restoran") {
              require "daftar-restoran.php";
            }
            else if($_GET["halaman"] == "tambah-restoran") {
              require "tambah-restoran.php";
            }
            else if($_GET["halaman"] == "resto-mail") {
              require "mail/kirim-info-resto.php";
            }
            else if($_GET["halaman"] == "daftar-penginapan") {
              require "daftar-penginapan.php";
            }
            else if($_GET["halaman"] == "tambah-penginapan") {
              require "tambah-penginapan.php";
            }
            else if($_GET["halaman"] == "penginapan-mail") {
              require "mail/kirim-info-penginapan.php";
            }
            else if($_GET["halaman"] == "galeri-wisata") {
              require "galeri-wisata.php";
            }
            else if($_GET["halaman"] == "galeri-restoran") {
              require "galeri-restoran.php";
            }
            else if($_GET["halaman"] == "galeri-penginapan") {
              require "galeri-penginapan.php";
            }
            else if($_GET["halaman"] == "subscriber") {
              require "subscriber.php";
            }
            else if($_GET["halaman"] == "edit-wisata") {
              require "edit-wisata.php";
            }
            else if($_GET["halaman"] == "hapus-wisata") {
              require "hapus-wisata.php";
            }
            else if($_GET["halaman"] == "edit-restoran") {
              require "edit-restoran.php";
            }
            else if($_GET["halaman"] == "hapus-restoran") {
              require "hapus-restoran.php";
            }
            else if($_GET["halaman"] == "edit-penginapan") {
              require "edit-penginapan.php";
            }
            else if($_GET["halaman"] == "hapus-penginapan") {
              require "hapus-penginapan.php";
            }

          }

        ?>

    </div>
  <!-- /.content-wrapper -->

<?php require "footer.php"; ?>