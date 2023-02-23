$(document).ready(function() {

	$('#btn-delete').on('click', function(e) {

		e.preventDefault()
		let href = $(this).attr('href')

		Swal.fire({
			title: 'Are you sure?',
			text: 'You will delete claim!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if(result.value) {
				Swal.fire(
					'Deleted!',
					'Your claim has been deleted',
					'success'
				)
				document.location.href = href;
			}
		})

	})

	$('#btn-cancel').on('click', function(e) {

		e.preventDefault()
		let href = $(this).attr('href')
			
		Swal.fire({
		title: 'Are you sure?',
		text: 'You will cancel claim!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, cancel it!'
		}).then((result) => {
			if(result.value) {
				Swal.fire(
					'Cancelled!',
					'Your claim has been cancelled',
					'success',
					2000
				)
				document.location.href = href;
			}
		})

	})

	$('#btn-getIt').on('click', function(e) {

		e.preventDefault()
		let href = $(this).attr('href')

		Swal.fire({
			title: 'Success!',
			text: 'Claim is success',
			icon: 'success'
		}).then(() => {
			document.location.href = href;
		})

	})

})