var baseUrl = window.location.origin;
let listMenuProfile = []
let listMenuProdi = []
let listMenuEkstra = []
$.ajax({
    url: baseUrl+'/users/getDataMain',
    type: "GET",
    dataType: "JSON",
    success: function(res){
        // console.log(res)
        if(res.data.master.statuscode == 200){
            $('#foot_nomor_telepon').html(res.data.master.data.noteleponsekolah)
            $('#foot_email_sekolah').html(res.data.master.data.emailsekolah)
            $('#foot_alamat_sekolah').html(res.data.master.data.alamatsekolah)
            $('#body_judul_sambutan').html(res.data.master.data.judulsambutan)
            $('#body_isi_sambutan').html(res.data.master.data.isisambutan)
            $('#body_foto_kepala').prop('src',storagePath+'/'+res.data.master.data.fotokepalasekolah)
            $('#body_video_profile').prop('src','https://www.youtube.com/embed/'+res.data.master.data.urlvideo)
            $('#body_judul_video_sekolah').html(res.data.master.data.judulvideoprofile)
            $('#body_description_video').html(res.data.master.data.descriptionvideo)
        }
        if(res.data.menuProfile.statuscode == 200){
           res.data.menuProfile.data.map((x=>{
                let jsonProfile = {
                    judul: x.judul,
                    menu: x.slug
                }
                listMenuProfile.push(jsonProfile)
                getMenuProfile()
           }))
        }
        if(res.data.menuProdi.statuscode == 200){
            res.data.menuProdi.data.map((x=>{
                let jsonProdi = {
                    judul: x.sinonim,
                    menu: x.slug
                }
                listMenuProdi.push(jsonProdi)
                getMenuProdi()
            }))
        }
        if(res.data.menuEkstra.statuscode == 200){
            res.data.menuEkstra.data.map((x => {
                let jsonEkstra = {
                    judul: x.sinonim,
                    menu: x.slug
                }
                listMenuEkstra.push(jsonEkstra)
                getMenuEkstra()
            }))
        }
    },
    error: function(error){
        console.log('Error '+error)
    }
})

const getMenuProfile=()=>{
    $('#menu_profile').html("")
    listMenuProfile.map((x,i)=>{
        $('#menu_profile').append(
            `
                <li>
                    <a href="${baseUrl}/profile/${x.menu}" class="block px-4 py-2 mx-2 transition ease-out rounded-md hover:bg-blue-600 hover:text-gray-50 hover:scale-105">${x.judul}</a>
                </li>
            `
        )
    })
}
const getMenuProdi=()=>{
    $('#menu_prodi').html("")
    listMenuProdi.map((x,i)=>{
        $('#menu_prodi').append(
            `
                <li>
                    <a href="${baseUrl}/programstudi/${x.menu}" class="block px-4 py-2 mx-2 transition ease-out rounded-md hover:bg-blue-600 hover:text-gray-50 hover:scale-105">${x.judul}</a>
                </li>
            `
        )
    })
}
const getMenuEkstra=()=>{
    $('#menu_ekstra').html("")
    listMenuEkstra.map((x,i)=>{
        $('#menu_ekstra').append(
            `
                <li>
                    <a href="${baseUrl}/ekstrakurikuler/${x.menu}" class="block px-4 py-2 mx-2 transition ease-out rounded-md hover:bg-blue-600 hover:text-gray-50 hover:scale-105">${x.judul}</a>
                </li>
            `
        )
    })
}
