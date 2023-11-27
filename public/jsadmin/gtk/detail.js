let btn_modal = document.getElementById("btn_modal");
let baseurl = window.location.origin;
let urlfull = window.location.href;
let id = urlfull.split("/").pop();
let csrfHash = $('input[name="_token"]').val(); // CSRF hash
let arrdatamapel = [];
$(document).ready(function () {
    $("#guruid").val(id);
});
// mengambul semua elemet
const btn_profile = document.getElementById("btn_profile");
const btn_ubahpassword = document.getElementById("btn_ubahpassword");

const content_profile = document.getElementById("profile");
const content_ubah_password = document.getElementById("ubah_password");

btn_profile.addEventListener("click", function () {
    content_profile.style.display = "block";
    // Tandai tombol "Profile" sebagai aktif
    btn_profile.classList.add("text-blue-800");
    btn_ubahpassword.classList.remove("text-blue-800");
    content_ubah_password.style.display = "none";
});

btn_ubahpassword.addEventListener("click", function () {
    content_profile.style.display = "none";
    btn_ubahpassword.classList.add("text-blue-800");
    btn_profile.classList.remove("text-blue-800");
    content_ubah_password.style.display = "block";
});
$.getJSON(baseurl + "/admin/gtk/getData/" + atob(id), function (res) {
    var photo = document.getElementById("images");
    if (res.datadetail.statuscode == 200) {
        $("#textnuptk").val(res.datadetail.data.nuptk);
        $("#textnip").val(res.datadetail.data.nip);
        $("#textnuptk").val(res.datadetail.data.nuptk);
        $("#textnama").val(res.datadetail.data.nama);
        $("#selectjenisKelamin").val(res.datadetail.data.jeniskelamin);
        $("#textalamat").val(res.datadetail.data.alamat);
        $("#selectpendidikanTerakhir").val(
            res.datadetail.data.pendidikanterakhir
        );
        $("#selectjabatan").val(res.datadetail.data.jabatan);
        $("#selecttugasTambahan").val(res.datadetail.data.tugastambahan);
        $("#selectrole").val(res.datadetail.data.role);
        $("#textEmail").val(res.datadetail.data.email);
        photo.src = baseurl + "/images/" + res.datadetail.data.photos;
    }
    console.log(res.datamapelajar.data);
    res.datamapelajar.data.map((x) => {
        let mapeldata = {
            idmapelajar: x.id,
            mapel: x.mapel.namamapel,
            status: "old",
        };
        arrdatamapel.push(mapeldata);
        eachDataMapel();
    });
});
const eachDataMapel = () => {
    $("#tbmapel").html("");
    let nomapel = 1;
    arrdatamapel.map((x, i) => {
        $("#tbmapel").append(eachmapel(x, nomapel++, i));
    });
};
const eachmapel = (x, no, i) => {
    return `
            <tr class="text-black bg-transparent border-0 border-t border-b">
                <th class="px-6 py-4 font-medium whitespace-nowrap">${no}</th>
                <td >${x.mapel}</td>
                <td class="text-center">
                    <button type="button" onclick="removeMapelAjar(this,${x.idmapelajar},'${x.status}',${i})" class="px-1 text-white bg-red-500 rounded-md"><i class="bi bi-x"></i></button>
                </td>
            </tr>
        `;
};

$(() => {
    tablechoosemapel = $("#tblchoosepelajaran").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        searching: true,
        ajax: {
            url: baseurl + "/admin/gtk/getDataMapel",
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

function pilihmapel(txt, idmapel, mapel) {
    var imapel = idmapel;
    let mapelchoose = {
        idmapelajar: idmapel,
        mapel: mapel,
    };
    arrdatamapel.push(mapelchoose);
    eachDataMapel();
    $.ajax({
        url: baseurl + "/admin/gtk/addmapelajar",
        type: "POST",
        dataType: "JSON",
        data: {
            _token: csrfHash,
            guruid: atob(id),
            mapelid: idmapel,
        },
        success: function (res) {},
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function removeMapelAjar(txt, id, status, i) {
    arrdatamapel.splice(i, 1);
    eachDataMapel();
    $.ajax({
        url: baseurl + "/admin/gtk/removemapelajar",
        type: "POST",
        dataType: "JSON",
        data: {
            imapelajar: id,
            _token: csrfHash,
        },
        success: function (res) {},
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}

function updatePassword(){
    $.ajax({
        url: baseurl+'/admin/gtk/updatepassword',
        type: "POST",
        dataType: "JSON",
        data: {
            id: atob(id),
            newpassword: $('#password').val(),
            confirmpassword: $('#cocokan_password').val(),
            _token: csrfHash
        },
        success: function(res){
            location.reload()
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR)
            if(jqXHR.status == 422){
                if(jqXHR.responseJSON.errors.newpassword != ""){
                    $('#information-passwordbaru').removeClass('hidden');
                    $('#information-passwordbaru').html(jqXHR.responseJSON.errors.newpassword)
                }
                if(jqXHR.responseJSON.errors.confirmpassword != ""){
                    $('#information-confirmpassword').removeClass('hidden');
                    $('#information-confirmpassword').html(jqXHR.responseJSON.errors.confirmpassword)
                }
            }
        }
    })
}

// Prosess Save atau Update Profile 
$('#form-profile').on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: baseurl + '/admin/gtk/updateprofile',
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false, 
        processData: false, 
        success: function(res){
            location.reload()
            console.log(res)
        },
        error: function(res){
            console.log(res)
            $('#errNuptk').html(res.responseJSON.errors.email)
            $('#errTextNip').html(res.responseJSON.errors.nip)
            $('#errTextNama').html(res.responseJSON.errors.textnama)
            $('#errSelectJenisKelamin').html(res.responseJSON.errors.selectJenisKelamin)
            $('#errTextAlamat').html(res.responseJSON.errors.textalamat)
            $('#errSelectPendidikanTerakhir').html(res.responseJSON.errors.selectpendidikanTerakhir)
            $('#errSelectTugasTambahan').html(res.responseJSON.errors.selecttugasTambahan)
            $('#errSelectRole').html(res.responseJSON.errors.selectrole)
            $('#errEmail').html(res.responseJSON.errors.email)
            // res.responseJSON.errors('')
        }
    })
})