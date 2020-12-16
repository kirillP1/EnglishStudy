$(document).ready(function() {
	$('.form').submit(function(event) {
		var json;
		event.preventDefault();
		jQuery.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					if(json.status == 'success' && typeof json.message == 'undefined'){
						Swal.fire({
							title: json.message,
							text: 'success',
							timer: 1500,
						})
					}else if(json.status == 'error' || json.status == 'Error'){
						Swal.fire({
							icon: 'error',
							title: 'Ой...',
							text: json.message,
							footer: '',
						})
					}else if(typeof json.message !== 'undefined'){
						Swal.fire({
							title: 'Вы уверены?',
							text: "Сохранить изменения?",
							icon: 'question',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Сохранить!',
							cancelButtonText: 'Не сохранять!',
						}).then((result) => {
							if (result.isConfirmed) {
								location.reload(true);
								Cache.delete();
							}
						})

					}
				}
			},
		});
	});
});
