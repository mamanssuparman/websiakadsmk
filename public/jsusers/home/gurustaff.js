let dataGuru=[];
$.getJSON(window.location.origin+'/home/getDataJsonGuru', function(res){
    if(res.status == 200){
        res.dataJsonGuru.map((x)=>{
            let json = {
                photos: x.photos,
                nama: x.nama
            }
            dataGuru.push(json)
        })
        getGuru()
    }
})

const getGuru = () => {
    let baseUrl = window.location.origin;
    let no=1
    dataGuru.map((x, i)=>{
        $('#card-list-guru').append(
            `
                <div class="block space-y-2 snap-start">
                    <div class="overflow-hidden rounded-lg">
                        <img src="${baseUrl}/images/${x.photos}" class="object-cover max-w-md transition duration-500 ease-in-out rounded-lg h-44 sm:h-56 hover:scale-105" alt="gallery1" id="img-guru-staff">
                    </div>

                    <div class="flex justify-center text-base font-semibold">
                        <span class="text-base tracking-tight text-gray-900" id="label-guru-staff">${x.nama}</span>
                    </div>
                </div>

            `
        )
    })
}
