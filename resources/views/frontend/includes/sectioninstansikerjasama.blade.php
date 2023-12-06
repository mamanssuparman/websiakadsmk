<section class="px-6 py-4 bg-blue-800">
    <div class="flex justify-center">
        <div
            class="flex justify-between gap-4 py-10 overflow-x-auto transition lg:flex-row md:flex-col sm:flex-col scroll-smooth">
            <div class="flex gap-4 lg:flex-row md:flex-col">
                @foreach ($dataMitra as $mitra)
                <div class="flex h-full grid-cols-1 px-4 py-4 transition duration-500 ease-in-out bg-white rounded-md shadow-lg w-52 hover:scale-105">
                    <img src="/images/{{ $mitra->picture }}" alt="" title="{{ $mitra->namamitra }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
