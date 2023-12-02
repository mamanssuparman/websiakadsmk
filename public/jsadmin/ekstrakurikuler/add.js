let baseurl = window.location.origin;

$(document).ready(function() {
     // Check Slug
    const judul = document.querySelector('#namaEskul')
    const slug = document.querySelector('#slug')

    judul.addEventListener('change', function() {
        fetch('/admin/ekstrakurikuler/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
})

$('#form-ekstrakurikuler').on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: baseurl+'/admin/ekstrakurikuler/stored',
        type: "POST",
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(res){
            location.reload()
        },
        error: function(res){
            console.log(res)
            $('#errNamaEskul').html(res.responseJSON.errors.namaEskul)
            $('#errSinonim').html(res.responseJSON.errors.textSinonim)
            $('#errDeskripsi').html(res.responseJSON.errors.deskripsi)
            $('#errLogo').html(res.responseJSON.errors.logo)
            $('#errPembinaEkstra').html(res.responseJSON.errors.pembinaEkstra)
        }
    })
})
