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
