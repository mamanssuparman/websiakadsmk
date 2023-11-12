let baseurl = window.location.origin;

$(document).ready(function() {
     // Check Slug
    const judul = document.querySelector('#namaEskul')
    const slug = document.querySelector('#slug')

    judul.addEventListener('change', function() {
        fetch('/admin/ekstrakurikuler/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug+'.html')
    })
})