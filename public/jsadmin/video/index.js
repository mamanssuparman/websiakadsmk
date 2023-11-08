let baseurl = window.location.origin;

$(document).ready(function () {
	table = $('#example2').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"searching": true,
		"ajax": {
			"url": '/admin/video/data-video',
			"type": "GET",
			"data": function (data) { }
		},
		"coloumnDefs": [{
			"targets": [0],
			"orderable": false,
		}]
	})

	$('#form-id').on('submit', function (e) {
		e.preventDefault()

		$('.error-messages').html('');

		var id = $('#idVideo').val();
		var method = "POST";
		var url = baseurl + '/admin/video/save-data';
		// var alert = '#alert-1';

		if (id) {
			url = baseurl + "/admin/video/" + id + "/update";
			method = "PUT";
			// alert = "#alert-2";
		}

		$.ajax({
			url: url,
			type: method,
			data: $(this).serialize(),
			success: function (response) {
				table.ajax.reload();
				$(alert).removeClass('hidden').addClass('flex');

				setTimeout(function () {
					$(alert).addClass('hidden').removeClass('flex');
				}, 3000);

				$('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Category</button>")
				$('#form-id')[0].reset();
			},

			error: function (response) {
				if (response.responseJSON && response.responseJSON.errors) {
					$('#judulError').html(response.responseJSON.errors.judul);
					$('#urlvideoError').html(response.responseJSON.errors.urlvideo);
					$('#jenisError').html(response.responseJSON.errors.jenis);
				}
			}
		})
	});

	// request show data edit
	$('body').on('click', '.edit', function () {
		var id = $(this).data('id');
		$.get('/admin/video/' + id + '/edit', function (data) {
			$('#judul').val(data.judul);
			$('#jenis').val(data.jenis);
			$('#urlvideo').val(data.urlvideo);
			$('#idVideo').val(data.id);
			$('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-slate-500 bg-yellow-300 rounded-md mt-9 hover:bg-yellow-400'><i class='bi bi-pencil-fill'></i></i> Edit Video</button>")
		})
	})
});


function activenonvideo(txt, id) {
	$.ajax({
		url: baseurl + "/admin/video/activenon",
		type: "POST",
		dataType: 'JSON',
		data: {
			idVideo: id
		},
		success: function (res) { },
		error: function (jqXHR, textStatus, errorThrown) { }
	});
}
