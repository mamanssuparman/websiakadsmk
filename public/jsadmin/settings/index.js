var baseUrl = window.location.origin;
console.log(baseUrl)
const csrfHash = $('input[name="_token"]').val();
var isSettings = false
$.ajax({
    url: baseUrl+'/admin/settings/getdatasettings',
    type: 'POST',
    dataType: 'JSON',
    data: {
        _token: csrfHash
    },
    success: function(res){
        console.log(res)
        if(res.statuscode == 200){
            $('#judul_video').val(res.data.judulvideoprofile)
            $('#framevideo').prop('src','https://www.youtube.com/embed/'+res.data.urlvideo)
            $('#description_video').val(res.data.descriptionvideo)
            $('#embeded_video').val(res.data.urlvideo)
            $('#thumbnail_foto_kepala').prop('src','/images/'+res.data.fotokepalasekolah)
            $('#judul_sambutan').val(res.data.judulsambutan)
            $('#isi_sambutan').val(res.data.isisambutan)
            $('#nomor_telepon').val(res.data.noteleponsekolah)
            $('#alamat_sekolah').val(res.data.alamatsekolah)
            $('#email_sekolah').val(res.data.emailsekolah)
            $('#url_map_sekolah').val(res.data.mapsekolah)
            $('#btn_simpan').addClass('hidden')
            $('#btn_update').removeClass('hidden')
            isSettings = true;
        } else {
            $('#btn_simpan').removeClass('hidden')
            $('#btn_update').addClass('hidden')
            // isSettings = false;
        }
    },
    error: function(jqXHR, textStatus, errorThrown){

    }
});

// Proses simpan
$('#form-settings').on('submit', function(e){
    e.preventDefault()
    var urlPost = baseUrl+'/admin/settings/stored';
    if(isSettings == true){
        urlPost = baseUrl+'/admin/settings/update';
    }
    $.ajax({
        url: urlPost,
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(res){
            location.reload()
        }

    })
})