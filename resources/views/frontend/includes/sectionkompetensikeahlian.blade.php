<section class="px-6 py-6">
    <div class="flex flex-col">
        <div class="flex flex-row">
            <div class="w-1 rounded-full h-7 bg-slate-800">

            </div>
            <div class="px-4">
                <div class="flex flex-row">
                    <div class="text-lg font-semibold">
                        Kompetensi Keahlian
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="flex gap-4 py-10 overflow-x-auto transition lg:flex-row md:flex-col sm:flex-col scroll-smooth">
                <div class="flex justify-between gap-4 lg:flex-row md:flex-col">
                    @foreach ($dataKompetensiKeahlian as $prodi)
                    <div
                        class="flex w-48 h-full grid-cols-1 px-4 py-4 transition duration-500 bg-gray-200 rounded-lg shadow-lg hover:scale-105">
                        <img src="/images/{{ $prodi->logoprodi }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
