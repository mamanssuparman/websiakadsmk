let baseurl = window.location.origin;

// Process Save
$('#form-add-gtk').on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: baseurl +'/admin/gtk/add',
        method: 'POST',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(res){
            // location.replace(baseurl+'/admin/gtk/add')
            location.reload()
            // console.log(res)
        },
        error: function(res){
            console.log(res)
            $('#errNuptk').html(res.responseJSON.errors.nuptk)
            $('#errNip').html(res.responseJSON.errors.nip)
            $('#errTextNama').html(res.responseJSON.errors.textNama)
            $('#errSelectJenisKelamin').html(res.responseJSON.errors.selectJenisKelamin)
            $('#errTextAlamat').html(res.responseJSON.errors.textAlamat)
            $('#errSelectPendidikanTerakhir').html(res.responseJSON.errors.selectPendidikanTerakhir)
            $('#errSelectJabatan').html(res.responseJSON.errors.selectJabatan)
            $('#errSelectTugasTambahan').html(res.responseJSON.errors.selectTugasTambahan)
            $('#errSelectRole').html(res.responseJSON.errors.selectRole)
            $('#errFotoProfile').html(res.responseJSON.errors.fotoProfile)
            $('#errTextEmail').html(res.responseJSON.errors.textemail)
        }
    })
})


// Preview Image
function previewImage(event){
    var reader = new FileReader();
    reader.onload = function(){
        $('#img-preview').show();
        var output = document.getElementById('img-preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}