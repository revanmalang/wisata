// sweetalert 2

$(document).ready(function() {

	// modal alert hapus data
	$("a.btn-danger").on("click", function(e) {
		e.preventDefault();

		const href = $(this).attr("href");

		Swal.fire({
			icon: "warning",
			title: "Yakin hapus data ini?",
			showCancelButton: true,
			confirmButtonText: "OK"
		}).then(result => {
		  if(result.value) {
		    document.location.href = href;
		  }
		})

	});

	// modal alert keluar
	$("a.link-logout").on("click", function(e) {
		e.preventDefault();

		const href = $(this).attr("href");

		Swal.fire({
			icon:  "question",
			title: "Yakin ingin keluar",
			showCancelButton: true,
			confirmButtonText: "OK"
		}).then((result) => {
			if(result.value) {
				document.location.href = href;
			}
		})

	});

});

// akhir sweetalert 2