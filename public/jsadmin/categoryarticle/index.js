let baseurl = window.location.origin;

$(document).ready(function() {
    
    // request read data
    table = $('#example2').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": true,
        "ajax": {
            "url":  '/admin/getCategoryarticle',
            "type": "GET",
            "data": function(data) {
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    })


    // request create data dan update category article
    $('#form-category').on('submit', function(e) {
        e.preventDefault()

        $('.error-messages').html('');

        var id = $('#idCategory').val();
        var method = "POST";
        var url = baseurl + '/admin/categoryarticle/store';
        var alert = '#alert-1';

        if (id) {
            url = baseurl+"/admin/categoryarticle/"+id+"/update";
            method = "PUT";
            alert = "#alert-2";
        }

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success:function(response){
                table.ajax.reload();
                $(alert).removeClass('hidden').addClass('flex');

                // show alert 3s
                setTimeout(function() {
                    $(alert).addClass('hidden').removeClass('flex');
                }, 3000);
                
                $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Category</button>")
                $('#form-category')[0].reset();
            },

            error: function(response) {
                if(response.responseJSON && response.responseJSON.errors) {
                    $('#categorynameError').html(response.responseJSON.errors.categoryname);
                    $('#categoryDeskripsiError').html(response.responseJSON.errors.deskripsi);
                }
            }
        })
    });


    // request show data edit
    $('body').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.get('/admin/categoryarticle/' + id + '/edit', function(data) {
            $('#categoryname').val(data.categoryname);
            $('#deskripsi').val(data.deskripsi);
            $('#idCategory').val(data.id);
            $('#btn-add-edit').replaceWith("<button id='btn-add-edit' class='px-5 py-3 font-semibold text-slate-500 bg-yellow-300 rounded-md mt-9 hover:bg-yellow-400'><i class='bi bi-pencil-fill'></i></i> Edit Category</button>")
        })
    })    
});


// request aktifnoncategory
function aktifnoncategory(txt, id) {
    $.ajax({
        url: baseurl+'/admin/categoryarticle/activenon',
        type: "POST",
        dataType: "JSON",
        data: {
            idcategory: id,
        },
        success: function(res){},
        error:function(jq, textStatus, errorThrown){}
    })
}


    