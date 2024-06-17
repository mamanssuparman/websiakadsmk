<section class="px-6 py-6 md:py-0 sm:py-0">
    <div class="flex flex-col lg:pt-10 sm:pt-4">
        <div class="flex flex-row">
            <div class="w-1 h-8 rounded-full bg-slate-900">
            </div>
            <div class="pl-4">
                <div class="flex flex-row justify-end">
                    <div class="text-xl font-semibold text-slate-900">
                        GTK
                    </div>
                    <div class="flex items-end pl-4 text-sm text-slate-500">
                        <a href="/gtk" class="">
                            Semua GTK
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="card-list-guru" class="flex gap-5 pt-10 overflow-x-auto snap-x scroll-smooth scrollbar-hidden">

        </div>

    </div>

</section>

@push('jsexternal')
    <script src="{{ url('') }}/jsusers/home/gurustaff.js">

    </script>
@endpush
