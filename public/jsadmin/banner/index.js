let baseurl = window.location.origin;
var iBanner
let csrfHash = $('input[name="_token"]').val()
$(document).ready(function(){
    
    // show data banners
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url":  '/admin/banner/getBanner',
            "type": "GET",
            "data": function(data) {
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })
    // process 
   
})

$('#form-banner').on('submit', function(e){
    e.preventDefault()

    $('.error-messages').val()
    let url = baseurl+'/admin/banner/stored';
    
    if(iBanner != undefined){
        url = baseurl+'/admin/banner/'+iBanner+'/update';
    }

    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false, 
        processData: false,
        success: function(res){
            table.ajax.reload(null, false);
            $('#form-banner')[0].reset();
            $('#preview-edit').hide()
            $('#preview').hide()
            $('#btn-add-edit').replaceWith("<button id='btn-add-edit' type='submit' class='px-5 py-3 font-semibold text-white bg-blue-500 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-edit-fill'></i>Tambah Banner</button>")
            iBanner = undefined
            $('#judulError').html('')
            $('#urlsError').html('')
            $('#fotoError').html('')
        },
        error: function(jqXHR, textStatus, errorThrown){
            if(jqXHR.responseJSON && jqXHR.responseJSON.errors){
                $('#judulError').html(jqXHR.responseJSON.errors.judul)
                $('#urlsError').html(jqXHR.responseJSON.errors.urls)
                $('#fotoError').html(jqXHR.responseJSON.errors.foto)
               
            }
        }
    })
})

function detail(txt, id){
    iBanner = id
    $.ajax({
        url: baseurl+'/admin/banner/getDataBanner',
        type: "POST",
        dataType: "JSON",
        data: {
            iBanner: id,
            _token: $('input[name="_token"]').val()
        },
        success: function(res){
            $('#judul').val(res.data.judul);
            $('#urls').val(res.data.urls);
            $('#preview-edit').prop('src', '/images/'+res.data.pictures)
            $('#btn-add-edit').replaceWith("<button id='btn-add-edit' type='submit' class='px-5 py-3 font-semibold text-white bg-yellow-500 rounded-md mt-9 hover:bg-yellow-800'><i class='bi bi-edit-fill'></i>Update Banner</button>")
            $('#preview-edit').show();
        },
        error: function(response){
            console.log(response)
        }
    })
}

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

function aktifnonbanner(txt, id){
    $.ajax({
        url: baseurl+'/admin/banner/activenon',
        type: "POST",
        dataType: 'JSON',
        data: {
            idbanner: id,
            _token: csrfHash
        },
        success: function(res){},
        error:function(jqXHR, textStatus, errorThrown){}
    });
}