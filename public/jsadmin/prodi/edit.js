let baseurl = window.location.origin
let urlfull = window.location.href
let ipro = urlfull.split("/").pop()
let csrfHash = $('input[name="_token"]').val()
let prestasi = []
let pekerjaan = []
let mapelajar = []
$.getJSON(baseurl+'/admin/prodi/getData/'+atob(ipro), function(res){
    console.log(res)
    if(res.dataprestasi.data.length > 0){
        res.dataprestasi.data.map((x)=>{
            let arrPrestasi = {
                id: x.id,
                deskripsi: x.deskripsi
            }
            prestasi.push(arrPrestasi)
            eachPrestasi()
        })
    }
    if(res.datapekerjaan.data.length>0){
        res.datapekerjaan.data.map((x)=>{
            let arrPekerjaan = {
                id: x.id,
                deskripsi: x.deskripsi
            }
            pekerjaan.push(arrPekerjaan)
            eachPekerjaan()
        })
    }
    if(res.datamapelajar.data.length>0){
        res.datamapelajar.data.map((x)=>{
            let arrMapelAjar = {
                id: x.id,
                deskripsi: x.deskripsi
            }
            mapelajar.push(arrMapelAjar)
            eachMapelAjar()
        })
    }
})

const eachMapelAjar = () =>{
    $('#tb-mapel-ajar').html("")
    let nomapelajar = 1
    mapelajar.map((x, i)=>{
        $('#tb-mapel-ajar').append(`
            <tr class="text-black bg-transparent border-0 border-t border-b">
                <td>${nomapelajar++}<input type="hidden" name="idmapel${x.id}" value="${x.id}"></td>
                <td>${x.deskripsi}</td>
                <td>
                    <button type="button" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300" onclick="hapusMapelAjar(this, ${x.id}, ${i})"><i class="bi bi-x"></i></button>
                </td>
            </tr>
        `)
    })
}
function addMapelAjar(){
    if ($("#nama_mapel_ajar").val() == "") {
        $("#information-nama-mapel-ajar").html("Mapel ajar tidak boleh kosong.!");
    } else {
        $.ajax({
            url: baseurl+'/admin/prodi/addMapelAjar',
            type: "POST",
            dataType: "JSON",
            data: {
                _token: csrfHash,
                namamapelajar: $('#nama_mapel_ajar').val(),
                idprodi: atob(ipro)
            },
            success: function(res){
                console.log(res)
                let arrMapelAjar = {
                    id: res.idmapel,
                    deskripsi: $('#nama_mapel_ajar').val()
                }
                mapelajar.push(arrMapelAjar)
                eachMapelAjar()
                $('#nama_mapel_ajar').val('')
                $('#information-nama-mapel-ajar').html("")
            },
            error: function(error){
                alert('gagal')
            }
        })
    }
}
function hapusMapelAjar(txt, id, i){
    $.ajax({
        url: baseurl+'/admin/prodi/removeMapelAjar',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: csrfHash,
            id: id
        },
        success: function(res){
            mapelajar.splice(i,1);
            eachMapelAjar()
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })
}
const eachPrestasi = () =>{
    $('#tb-prestasi').html("")
    let noprestasi = 1
    prestasi.map((x, i)=>{
        $('#tb-prestasi').append(`
            <tr class="text-black bg-transparent border-0 border-t border-b">
                <td>${noprestasi++}<input type="hidden" name="idmapel${x.id}" value="${x.id}"></td>
                <td>${x.deskripsi}</td>
                <td>
                    <button type="button" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300" onclick="hapusPrestasi(this, ${x.id}, ${i})"><i class="bi bi-x"></i></button>
                </td>
            </tr>
        `)
    })
}

function hapusPrestasi(txt, id, i){
    $.ajax({
        url: baseurl+'/admin/prodi/removePrestasi',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: csrfHash,
            id: id
        },
        success: function(res){
            prestasi.splice(i,1);
            eachPrestasi()
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })

}

const eachPekerjaan = () =>{
    $('#tb-pekerjaan').html("")
    let nopekerjaan = 1
    pekerjaan.map((x, i)=>{
        $('#tb-pekerjaan').append(`
            <tr class="text-black bg-transparent border-0 border-t border-b">
                <td>${nopekerjaan++}<input type="hidden" name="idmapel${x.id}" value="${x.id}"></td>
                <td>${x.deskripsi}</td>
                <td>
                    <button type="button" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300" onclick="hapusPekerjaan(this, ${x.id}, ${i})"><i class="bi bi-x"></i></button>
                </td>
            </tr>
        `)
    })
}
function addPekerjaan(){
    if ($("#nama_pekerjaan").val() == "") {
        $("#information-nama-pekerjaan").html("Pekerjaan tidak boleh kosong.!");
    } else {
        $.ajax({
            url: baseurl+'/admin/prodi/addPekerjaan',
            type: "POST",
            dataType: "JSON",
            data: {
                _token: csrfHash,
                namapekerjaan: $('#nama_pekerjaan').val(),
                idprodi: atob(ipro)
            },
            success: function(res){
                console.log(res)
                let arrPekerjaan = {
                    id: res.idprestasi,
                    deskripsi: $('#nama_pekerjaan').val()
                }
                pekerjaan.push(arrPekerjaan)
                eachPekerjaan()
                $('#nama_pekerjaan').val('')
                $('#information-nama-pekerjaan').html("")
            },
            error: function(error){
                alert('gagal')
            }
        })
    }
}
function hapusPekerjaan(txt, id, i){
    $.ajax({
        url: baseurl+'/admin/prodi/removePekerjaan',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: csrfHash,
            id: id
        },
        success: function(res){
            pekerjaan.splice(i,1);
            eachPekerjaan()
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })
}
function addPrestasi() {
    if ($("#nama_prestasi").val() == "") {
        $("#information-nama-prestasi").html("Prestasi tidak boleh kosong.!");
    } else {
        $.ajax({
            url: baseurl+'/admin/prodi/addPrestasi',
            type: "POST",
            dataType: "JSON",
            data: {
                _token: csrfHash,
                namaprestasi: $('#nama_prestasi').val(),
                idprodi: atob(ipro)
            },
            success: function(res){
                console.log(res)
                let arrPrestasi = {
                    id: res.idprestasi,
                    deskripsi: $('#nama_prestasi').val()
                }
                prestasi.push(arrPrestasi)
                eachPrestasi()
                $('#nama_prestasi').val('')
                $('#information-nama-prestasi').html("")
            },
            error: function(error){
                alert('gagal')
            }
        })
    }
}
