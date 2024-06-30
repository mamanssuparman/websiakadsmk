let dataKompetensi = []
$.getJSON(window.location.origin+'/home/getDataKompetensi', function(res){
    if(res.status == 200){
        res.dataJsonProdi.map((x)=>{
            let json = {
                photos: x.logoprodi,
                nama: x.judul,
                slug: x.slug
            }
            dataKompetensi.push(json)
        })
        getKompetensi()
    }
})

const getKompetensi =()=>{
    base=window.location.origin
    dataKompetensi.map((x,i)=>{
        $('#card-kompetensi').append(
            `
                <div class="flex justify-between gap-4 lg:flex-row md:flex-col">
                    <div
                        class="flex items-center w-48 h-full grid-cols-1 px-4 py-4 transition duration-500 bg-gray-200 rounded-lg shadow-lg hover:scale-105">
                        <a href="${base}/programstudi/${x.slug}"> <img src="${storagePath}/${x.photos}" alt=""></a>
                    </div>
                </div>
            `
        )
    })
}
