let dataMitra = [];
$.getJSON(window.location.origin+'/home/getDataMitra', function(res){
    if(res.status == 200){
        res.dataJsonMitra.map((x)=>{
            let json = {
                photos: x.picture,
                nama: x.namamitra
            }
            dataMitra.push(json)
        })
        getMitra()
    }
})

const getMitra = ()=>{
    let baseUrl = window.location.origin;
    dataMitra.map((x,i)=>{
        $('#card-mitra').append(
            `
            <div class="flex gap-4 lg:flex-row md:flex-col">
                <div class="flex items-center w-48 h-full grid-cols-1 px-4 py-4 transition duration-500 bg-gray-200 rounded-lg shadow-lg hover:scale-105">
                    <img src="${storagePath}/${x.photos}" alt="" title="${x.nama}">
                </div>
            </div>
            `
        )
    })
}
