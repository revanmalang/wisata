<?php 

  // cek jika index "s" & index "err" sdh diset & jika blm diset
  if(isset($_GET["s"])) {
    // ambil data di url utk status phpmailer ke subscriber
    $statusMail = $_GET["s"];
    // ambil data di url utk status error info
    if(isset($_GET["err"])) {
      $errorInfo = base64_decode($_GET["err"]);
    }
  }

  // mengambil data wisata pegunungan dari tabel wisata
  $ambilDataPeg = $conn->query("SELECT * FROM tbl_wisata JOIN tbl_kategori_wisata ON tbl_wisata.id_kategori_wisata = tbl_kategori_wisata.id_kategori_wisata WHERE tbl_kategori_wisata.kategori_wisata = 'Pegunungan' ORDER BY tbl_wisata.id_wisata DESC ");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    	<div class="row mb-2">
          	<div class="col-sm-6">
            	<h1>Wisata Pegunungan</h1>
          	</div>
	        <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              	<li class="breadcrumb-item"><a href="#">Home</a></li>
	              	<li class="breadcrumb-item">Wisata</li>
	              	<li class="breadcrumb-item active">Pegunungan</li>
	            </ol>
	        </div>
    	</div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header">
          	<h3 class="card-title">Daftar</h3>

          	<div class="card-tools">
            	<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              	<i class="fas fa-minus"></i>
            	</button>
            	<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              	<i class="fas fa-times"></i>
            	</button>
          	</div>
        </div>
        <div class="card-body table-responsive p-0">

          	<table class="table table-striped projects">
              	<thead>
                  	<tr>
                      	<th>
                          No
                      	</th>
                        <th>
                          Kategori
                        </th>
                      	<th>
                          Nama
                      	</th>
                      	<th>
                          Alamat
                      	</th>
                      	<th>
                          Url lokasi
                      	</th>
                        <th>
                          Nomor Telepon
                        </th>
                        <th>
                          Jam Buka
                        </th>
                      	<th>
                          Tiket dewasa (Rp.)
                      	</th>
                        <th>
                          Tiket anak (Rp.)
                        </th>
                        <th>
                          Foto
                        </th>
                      	<th>
                          Aksi
                      	</th>
                  	</tr>
              	</thead>
              	<tbody>

                    <?php 
                      $no = 1;
                      while($pecahDataPeg = $ambilDataPeg->fetch_assoc()) { 
                    ?>
                  	<tr>
                    	<td>
                        	<?=$no; ?>
                    	</td>
                    	<td>
                        	<?=$pecahDataPeg['kategori_wisata']; ?>
                    	</td>
                    	<td>
                        	<?=$pecahDataPeg['nama_wisata']; ?>
                    	</td>
                    	<td>
                        	<?=$pecahDataPeg['alamat_wisata']; ?>
                    	</td>
	                    <td>
	                        <a href="<?=$pecahDataPeg['url_lokasi']; ?>" target="_blank">Lihat Peta</a>
	                    </td>
                      <td>
                          <?=$pecahDataPeg['nomor_telepon']; ?>
                      </td>
                      <td>
                          <?=$pecahDataPeg['jam_buka']; ?>
                      </td>
                      <td>
                          <?=number_format($pecahDataPeg['harga_tiket_dewasa']); ?>
                      </td>
                      <td>
                          <?=number_format($pecahDataPeg['harga_tiket_anak']); ?>
                      </td>
                      <td>
                          <img src="dist/img/tour-img/<?=$pecahDataPeg['foto_wisata']; ?>" class="img-thumbnail" width="200" alt="Foto wisata">
                      </td>
                    	<td class="text-right">
                        	<a class="btn btn-info btn-sm" href="index.php?halaman=edit-wisata&id=<?=$pecahDataPeg['id_wisata']; ?>">
                            	<i class="fas fa-pencil-alt">
                            	</i>
                            	Edit
                        	</a>
                        <a class="btn btn-danger btn-sm" href="index.php?halaman=hapus-wisata&k=pegunungan&id=<?=$pecahDataPeg['id_wisata']; ?>">
                            <i class="fas fa-trash">
                            </i>
                            Hapus
                        </a>
                    	</td>
                  	</tr>
                    <?php 
                      $no++;
                      } 
                    ?>

              	</tbody>
          	</table>

        </div>
        <!-- /.card-body -->
    </div>
  	<!-- /.card -->

</section>
<!-- /.content -->

<!-- value status utk phpmailer subscriber & phpmailer error info -->
<input type="hidden" id="status-mail" value="<?=$statusMail; ?>">
<input type="hidden" id="error-info" value="<?=$errorInfo; ?>">

<!-- script modal alert hapus data -->
<script src="dist/js/sweetalert/sweetalert-script.js"></script>

<!-- alert utk status phpmailer subscriber -->
<script>
  $(document).ready(function() {

    let statusMail = $("input#status-mail").val();
    let errInfo = $("input#error-info").val();

    if(statusMail == "1") {

      Swal.fire({
        icon: "success",
        title: "Pesan terkirim ke subscriber",
        showCancelButton: false,
        confirmButtonText: "OK"
      })
      
    }
    else if(statusMail == "0") {
      
      Swal.fire({
        icon: "error",
        title: "Gagal mengirim pesan ke subscriber",
        text: errInfo,
        showCancelButton: false,
        confirmButtonText: "OK"
      })

    }

  });
</script>
