let baseUrl = window.location.origin;
let id = window.location.href.split("/").pop()
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Image',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    clipboard_handleImages: false
}
CKEDITOR.replace('editor1', options);
console.log(id)
$.getJSON(baseUrl+'/admin/article/getdetail/'+id, function(){
}).done(function(e){
    console.log(e)
    $('#judul').val(e.judul);
    $('#selectCategory').val(e.categoriesid);
    $('#thumbnailheader').prop('src', storagePath +'/'+e.headerpicture);
    CKEDITOR.instances["editor1"].setData(e.article);
}).fail(function(e){
    console.log(e)
})

//Function Update
$("#form-update-article").on("submit", function (e) {
    for (instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].updateElement();
    data = new FormData($("#form-update-article")[0]);
    data.append("article", $("#editor1").val());
    e.preventDefault();
    $.ajax({
        url: baseUrl + "/admin/article/edit/"+id,
        type: "POST",
        dataType: "JSON",
        data: data,
        contentType: false,
        processData: false,
        success: function (res) {
            location.reload();
        },
        error: function (res) {
            location.reload()
        },
    });
});
