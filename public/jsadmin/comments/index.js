let baseurl = window.location.origin;
let csrfHash = $('input[name="_token"]').val(); // CSRF hash

$(document).ready(function () {
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url": '/admin/comment/getDataComments',
            "type": "GET",
            "data": function (data) { }
        },
        "coloumnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })

});

function activenoncomments(txt, id) {
    $.ajax({
        url: baseurl + "/admin/comment/activenon",
        type: "POST",
        dataType: 'JSON',
        data: {
            idComment: id
        },
        success: function (res) {
            // Lakukan sesuatu dengan respons dari server (res)
            if (res.statuscode === 200) {
                // Ubah elemen-elemen di halaman sesuai kebutuhan
                console.log(res.data); // Output pesan sukses
            } else {
                // Handle kesalahan jika diperlukan
                console.log("Error: " + res.data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle kesalahan AJAX
            console.log("AJAX Error: " + textStatus);
        }
    });
}


