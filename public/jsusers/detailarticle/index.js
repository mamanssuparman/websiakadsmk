var baseUrl = window.location.origin;
var slug = window.location.href.split("/").pop()
// var csrfHash = $('input[name="_token"]').val()
// get data
$.getJSON(baseUrl+'/getDetailArticle/'+slug, function(e){
}).done(function(e){
    console.log(e);
    $('#judularticle').html(e.data.judul);
    $('#users-post').html(e.data.user.nama);
    $('#detail-article').html(e.data.article);
    if(e.data.headerpicture == 'headerdefault.jpg'){
        $('#header-picture').addClass('hidden');
    } else {
        $('#header-picture').prop('src', storagePath + '/'+e.data.headerpicture);
    }
}).fail(function(e){
    console.log('gagal mengambil data');
})
function sendComment(){
    // var slug = window.location.href.split("/").pop()
    $.ajax({
        url: baseUrl+'/sendComment/'+slug,
        type: "POST",
        dataType: "JSON",
        data: $('#form-commentar').serialize(),
        success: function(res){
            alert(res.message)
            document.getElementById('form-commentar').reset()
        },
        error: function(res){
            $('#errNamaCommentar').html(res.responseJSON.errors.namacomentar)
            $('#errIsiComentar').html(res.responseJSON.errors.isicomentar)
            $('#errEmail').html(res.responseJSON.errors.email)
        }
    })
}
