let baseurl = window.location.origin;
$(document).ready(function() {
    
    // show data ekstrakulikuler sekolah
        table = $('#example2').DataTable({
            "processing" :true,
            "serverSide" :true,
            "order"      :[],
            "searching": true,

            "ajax":{
                "url": "/admin/getEkstrakulikuler",
                "type" : "GET",
                "data" : function($data) {
                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        }); 
})


// active non active togle update
function aktifnonekstra(txt, id) {
    $.ajax({
        url: '/admin/ekstrakurikuler/activenon',
        type: "POST",
        dataType: "JSON",
        data: {
            idekstra: id,
        },
        success: function(res){},
        error:function(jq, textStatus, errorThrown){}
    })
}