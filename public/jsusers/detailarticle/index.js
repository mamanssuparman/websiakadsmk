var baseUrl = window.location.origin;
// var csrfHash = $('input[name="_token"]').val()
function sendComment(){
    var slug = window.location.href.split("/").pop()
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
