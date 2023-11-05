let baseurl = window.location.origin;
let csrfHash = $('input[name="_token"]').val(); // CSRF hash
$(() => {
    tabelgtk = $("#example2").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        searching: true,
        ajax: {
            url: baseurl + "/prodi/getDataProdi",
            type: "GET",
            data: function (data) {},
        },
        columnDefs: [
            {
                targets: [0],
                orderable: false,
            },
        ],
    });
});
