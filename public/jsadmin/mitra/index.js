let baseurl = window.location.origin;
let csrfHash = $('input[name="_token"]').val()
var iMitra = undefined;
$(document).ready(function(){
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url":  '/admin/getListMitra',
            "type": "POST",
            "data": function(data) {
                data._token = csrfHash
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })
})

// Save
$('#form-mitra').on('submit', function(e){
    e.preventDefault()

    var siTeUrl = baseurl+'/admin/mitra/stored';

    if(iMitra != undefined){
        siTeUrl = baseurl+'/admin/mitra/Update/'+iMitra;
    }

    $.ajax({
        url: siTeUrl,
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(res){
            table.ajax.reload(null, false)
            document.getElementById('form-mitra').reset();
            document.getElementById('preview').removeAttribute('src');
            document.getElementById('preview-edit').removeAttribute('src');
            $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i> Add Mitra</button>")
            iMitra = undefined
            // $('#preview').hide();
            // $('#preview-edit').hide();
        },
        error: function(res){
            $('#ErrNamaMitra').html(res.responseJSON.errors.nama_mitra)
            $('#errPictures').html(res.responseJSON.errors.pictures)
        }
    })
})

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

// Edit Mitra
function editMitra(id){
    iMitra = id
    $.getJSON(baseurl+'/admin/mitra/getDataMitra/'+id, function(res){
        console.log(res)
        $('#nama_mitra').val(res.data.namamitra);
        $('#preview-edit').attr('src','/images/'+res.data.picture)
        $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-yellow-700 rounded-md mt-9 hover:bg-yellow-900'><i class='bi bi-plus'></i> Update Mitra</button>")
    });
}
