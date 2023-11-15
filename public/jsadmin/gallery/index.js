let baseurl = window.location.origin;
$(document).ready(function() {

    // show dara photos
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url":  '/admin/getGallery',
            "type": "GET",
            "data": function(data) {
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })


    // request create data dan update gallery photo
    $('#form-gallery').on('submit', function(e) {
        e.preventDefault()

        $('.error-messages').html('');

        var id = $('#idGallery').val();
        var method = "POST";
        var url = baseurl+'/admin/gallery/store';
        var alert = '#alert-1';

        if (id) {
            url = baseurl+"/admin/gallery/"+id+"/update";
            method = "POST";
            alert = "#alert-2";
        }

        $.ajax({
            url: url,
            type: method,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(response){
                table.ajax.reload();
                $(alert).removeClass('hidden').addClass('flex');

                // show alert 3s
                setTimeout(function() {
                    $(alert).addClass('hidden').removeClass('flex');
                }, 3000);

                $('#form-gallery')[0].reset();
                $('#preview-edit').hide();
                $('#preview').hide();
                $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Photo</button>")
            },

            error: function(response) {
                if(response.responseJSON && response.responseJSON.errors) {
                    $('#judulError').html(response.responseJSON.errors.judul);
                    $('#jenisError').html(response.responseJSON.errors.jenis);
                    $('#fotoError').html(response.responseJSON.errors.foto);
                }
            }
        })
    });

    // request show data edit
    $('body').on('click', '.edit', function() {
        $('#preview-edit').show();
        var id = $(this).data('id');
        $.get('/admin/gallery/' + id + '/edit', function(data) {
            $('#judul').val(data.judul);
            // $('#jenis').val(data.jenis);
            $('#idGallery').val(data.id);
            $('#preview-edit').attr('src', '/images/'+data.picture);
            $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-slate-500 bg-yellow-300 rounded-md mt-9 hover:bg-yellow-400'><i class='bi bi-pencil-fill'></i></i> Edit Photo</button>")
        })
    })

})



// request aktifnonaktif gallery
function aktifnoncategory(txt, id) {
    $.ajax({
        url: baseurl+'/admin/gallery/activenon',
        type: "POST",
        dataType: "JSON",
        data: {
            idgallery: id,
        },
        success: function(res){},
        error:function(jq, textStatus, errorThrown){}
    })
}



    // privew image
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            $('#preview').show();
            $('#preview-edit').hide();
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
