let baseurl = window.location.origin;
let prestasi = [];
let pekerjaan = [];
let mapelajar = [];
let csrfHash = $('input[name="_token"]').val();
function addPrestasi() {
    if ($("#nama_prestasi").val() == "") {
        $("#information-nama-prestasi").html("Prestasi tidak boleh kosong.!");
    } else {
        let arrDataPrestasi = {
            prestasi: $("#nama_prestasi").val(),
        };
        prestasi.push(arrDataPrestasi);
        eachDataPrestasi();
        $("#nama_prestasi").val("");
        $("#information-nama-prestasi").html("");
    }
}
const eachDataPrestasi = () => {
    $("#tb-prestasi").html("");
    let noUrutPrestasi = 1;
    prestasi.map((x, i) => {
        $("#tb-prestasi").append(`
                    <tr class="border-t border-slate-300">
                        <td>${noUrutPrestasi++}</td>
                        <td>${
                            x.prestasi
                        }<input type="hidden" name="prestasi_name[]" value="${
            x.prestasi
        }"></td>
                        <td><button type="button" onclick="hapusPrestasi(${i})" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300"><i class="bi bi-x"></i></button></td>
                    </tr>
                `);
    });
};
const hapusPrestasi = (i, val) => {
    prestasi.splice(i, 1);
    eachDataPrestasi();
};

function addPekerjaan() {
    if ($("#nama_pekerjaan").val() == "") {
        $("#information-pekerjaan").html("Pekerjaan tidak boleh kosong.!");
    } else {
        let arrDataPekerjaan = {
            pekerjaan: $("#nama_pekerjaan").val(),
        };
        pekerjaan.push(arrDataPekerjaan);
        eachDataPekerjaan();
        $("#nama_pekerjaan").val("");
        $("#information-pekerjaan").html("");
    }
}
const eachDataPekerjaan = () => {
    $("#tb-pekerjaan").html("");
    let noUrutPekerjaan = 1;
    pekerjaan.map((x, i) => {
        $("#tb-pekerjaan").append(`
                    <tr class="border-t border-slate-300">
                        <td>${noUrutPekerjaan++}</td>
                        <td>${
                            x.pekerjaan
                        }<input type="hidden" name="pekerjaan_name[]" value="${
            x.pekerjaan
        }"></td>
                        <td><button type="button" onclick="hapusPekerjaan(${i})" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300"><i class="bi bi-x"></i></button></td>
                    </tr>
                `);
    });
};
const hapusPekerjaan = (i, val) => {
    pekerjaan.splice(i, 1);
    eachDataPekerjaan();
};

function addMapelAjar() {
    if ($("#nama_mapel_ajar").val() == "") {
        $("#information-mapelajar").html(
            "Mapel di pelajari tidak boleh kosong.!"
        );
    } else {
        let arrMapelAjar = {
            mapelajar: $("#nama_mapel_ajar").val(),
        };
        mapelajar.push(arrMapelAjar);
        eachDataMapelAjar();
        $("#nama_mapel_ajar").val("");
        $("#information-mapelajar").html("");
    }
}
const eachDataMapelAjar = () => {
    $("#tb-mapelajar").html("");
    let noUrutMapelAjar = 1;
    mapelajar.map((x, i) => {
        $("#tb-mapelajar").append(`
                    <tr class="border-t border-slate-300">
                        <td>${noUrutMapelAjar++}</td>
                        <td>${
                            x.mapelajar
                        }<input type="hidden" name="mapel_ajar[]" value="${
            x.mapelajar
        }"></td>
                        <td><button type="button" onclick="hapusMapelAjar(${i})" class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring red-300"><i class="bi bi-x"></i></button></td>
                    </tr>
                `);
    });
};
const hapusMapelAjar = (i, val) => {
    mapelajar.splice(i, 1);
    eachDataMapelAjar();
};

// Check Slug
const title = document.querySelector('#nama_prodi')
const slug = document.querySelector('#slug')

title.addEventListener('change', function() {
    fetch('/admin/prodi/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
})
