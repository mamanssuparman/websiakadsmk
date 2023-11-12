let baseurl = window.location.origin;
let csrfHash = $('input[name="_token"]').val(); // CSRF hash
$(() => {
    tabelgtk = $("#example2").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        searching: true,
        ajax: {
            url: baseurl + "/admin/profile/getDataProfile",
            type: "GET",
            data: function (data) {},
        },
        columnDefs: [
            {
                targets: [0],
                orderable: false,
            },
        ],
    });
});

function activenon(txt,id){
    // console.log(id)
    $.ajax({
        url: baseurl+'/admin/profile/activenon',
        type: "POST",
        dataType: 'JSON',
        data: {
            iprofile: id,
            _token: csrfHash
        },
        success: function(res){},
        error:function(jqXHR, textStatus, errorThrown){}
    });
}
