let baseurl = window.location.origin;

$(document).ready(function () {
    // request read data
    table = $('#example2').DataTable({
        "processing" :true,
        "serverSide" :true,
        "order"      :[],
        "searching": true,

        "ajax":{
            "url": "/admin/getMapel",
            "type" : "GET",
            "data" : function($data) {
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });

    // request create data dan update category article
    $("#form-mapel").on("submit", function (e) {
        e.preventDefault();

        $(".error-messages").html("");

        var id = $("#idMapel").val();
        var method = "POST";
        var url = baseurl + "/admin/mapel/store";
        var alert = "#alert-1";

        if (id) {
            url = baseurl + "/admin/mapel/" + id + "/update";
            method = "PUT";
            alert = "#alert-2";
        }

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function (response) {
                table.ajax.reload();
                $(alert).removeClass("hidden").addClass("flex");

                // show alert 3s
                setTimeout(function () {
                    $(alert).addClass("hidden").removeClass("flex");
                }, 3000);

                $("#btn-add-edit").replaceWith(
                    "<button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Category</button>"
                );
                $("#form-mapel")[0].reset();
            },

            error: function (response) {
                if (response.responseJSON && response.responseJSON.errors) {
                    $("#namamapelError").html(
                        response.responseJSON.errors.namamapel
                    );
                    $("#descriptionError").html(
                        response.responseJSON.errors.description
                    );
                }
            },
        });
    });

    // request show data edit
    $("body").on("click", ".edit", function () {
        var id = $(this).data("id");
        $.get("/admin/mapel/" + id + "/edit", function (data) {
            $("#namamapel").val(data.namamapel);
            $("#description").val(data.description);
            $("#idMapel").val(data.id);
            $("#btn-add-edit").replaceWith(
                "<button id='btn-add-edit' class='px-5 py-3 font-semibold text-slate-500 bg-yellow-300 rounded-md mt-9 hover:bg-yellow-400'><i class='bi bi-pencil-fill'></i></i> Edit Mapel</button>"
            );
        });
    });
});

// request aktifnoncategory
function aktifnonmapel(txt, id) {
    $.ajax({
        url: baseurl + "/admin/mapel/activenon",
        type: "POST",
        dataType: "JSON",
        data: {
            idmapel: id,
        },
        success: function (res) {},
        error: function (jq, textStatus, errorThrown) {},
    });
}
