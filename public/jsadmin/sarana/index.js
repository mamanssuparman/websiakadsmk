let baseurl = window.location.origin;
let idSarana = undefined;
$(document).ready(function() {

    // show dara photos
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url":  '/admin/sarana/getSarana',
            "type": "GET",
            "data": function(data) {
                _token: $('input[name="_token"]')
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })


    // request create data dan update gallery photo
    $('#form-sarana').on('submit', function(e) {
        e.preventDefault()
        var urlNya = baseurl+'/admin/sarana/stored'
        if(idSarana != undefined){
            urlNya = baseurl+'/admin/sarana/update/'+idSarana
        }

        $.ajax({
            url: urlNya,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(response){
                idSarana = undefined
                console.log(response)
                table.ajax.reload();
                $(alert).removeClass('hidden').addClass('flex');

                // show alert 3s
                setTimeout(function() {
                    $(alert).addClass('hidden').removeClass('flex');
                }, 3000);

                $('#form-sarana')[0].reset();
                $('#preview-edit').hide();
                $('#preview').hide();
                $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Photo</button>")
            },

            error: function(response) {
                console.log(response)
                if(response.responseJSON && response.responseJSON.errors) {
                    $('#saranaError').html(response.responseJSON.errors.sarana);
                    $('#fotoError').html(response.responseJSON.errors.foto);
                }
            }
        })
    });


})

function detailSarana(txt, id){
    idSarana = id,
    console.log(idSarana)
    $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-yellow-700 rounded-md mt-9 hover:bg-yellow-800'><i class='bi bi-plus'></i>Update Sarana</button>")
    $.getJSON(baseurl+'/admin/sarana/getSarana/'+id, function(res){
        $('#sarana').val(res.data.judul)
        $('#preview-edit').prop('src','/images/'+res.data.pictures)
        $('#preview').hide();
        $('#preview-edit').show();
    })
}

// request aktifnonaktif gallery
function aktifnonsarana(txt, id) {
    $.ajax({
        url: baseurl+'/admin/sarana/activenon',
        type: "POST",
        dataType: "JSON",
        data: {
            idsarana: id,
            _token: $('input[name="_token"]').val()
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
