let baseurl = window.location.origin;
        let csrfHash = $('input[name="_token"]').val(); // CSRF hash
    $(() => {
		tabelgtk = $('#example2').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"searching": true,
			"ajax": {
				"url":  baseurl + '/gtk/getDataGtk',
				"type": "GET",
				"data": function(data) {
				}
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}]
		})
	})

    function aktifnonuseres(txt,id){
        $.ajax({
            url: baseurl+'/admin/gtk/activenon',
            type: "POST",
            dataType: 'JSON',
            data: {
                iuser: id,
                _token: csrfHash
            },
            success: function(res){},
            error:function(jqXHR, textStatus, errorThrown){}
        });
    }
