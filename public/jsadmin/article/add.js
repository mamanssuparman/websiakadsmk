let baseUrl = window.location.origin;

var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Image",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
    clipboard_handleImages: false,
};
CKEDITOR.replace("editor1", options);

// Check Slug
const title = document.querySelector("#judul");
const slug = document.querySelector("#slug");

title.addEventListener("change", function () {
    fetch("/admin/article/checkSlug?title=" + title.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

$('#form-add-article').on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: baseUrl+'/admin/article/add',
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(res){
            location.reload()
        },
        error: function(res){
            console.log(res)
        }
    })
})
