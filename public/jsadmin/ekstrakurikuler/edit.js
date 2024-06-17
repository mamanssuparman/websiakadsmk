let baseurl = window.location.origin;
let id = window.location.href.split("/").pop();
$.getJSON(baseurl+'/admin/ekstrakurikuler/getData/'+atob(id), function(res){
    console.log(res)
    $('#namaEskul').val(res.data.judul)
    $('#textSinonim').val(res.data.sinonim)
    $('#deskripsi').html(res.data.description)
    $('#pembinaEkstra').val(res.data.pembinaid)
})

$('#form-update-ekstrakurikuler').on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: baseurl+'/admin/ekstrakurikuler/update/'+atob(id),
        type: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(res){
            console.log(res);
            location.reload();
        },
        error:function(res){
            console.log(res)
        }
    })
})
