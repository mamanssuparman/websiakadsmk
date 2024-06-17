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
            <div class="flex gap-4 py-10 overflow-x-auto transition lg:flex-row md:flex-col sm:flex-col scroll-smooth" id="card-kompetensi">

            </div>
        </div>
    </div>
</section>
@push('jsexternal')
    <script src="/jsusers/home/kompetensiKeahlian.js"></script>
@endpush
