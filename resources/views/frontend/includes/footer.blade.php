<footer class="py-6 md:py-0 sm:py-0">
    <div class="flex lg:h-[387px] bg-gray-200 w-full">
        <div class="flex flex-col w-full lg:flex-row md:flex-col">
            <!-- Start Kiri  -->
            <div class="flex justify-center px-4 lg:w-full md:w-full sm:w-full">
                <div class="flex flex-col justify-center w-full">
                    <div class="flex justify-center pt-4">
                        <img src="{{ url('') }}/images/logosmk.png" alt="">
                    </div>
                    <div class="flex justify-center gap-4 pt-4">
                        <div class="text-3xl"><i class="items-center bi bi-twitter-x"></i></div>
                        <div class="text-3xl"><i class="items-center bi bi-facebook"></i></div>
                        <div class="text-3xl"><i class="items-center bi bi-youtube"></i></div>
                        <div class="text-3xl"><i class="items-center bi bi-instagram"></i></div>
                    </div>
                </div>
            </div>
            <!-- End Kiri  -->

            <!-- Start Tengah  -->
            <div class="flex px-4 lg:w-full md:w-full sm:w-full">
                <div class="flex flex-col justify-center px-4 py-4">
                    <div class="flex flex-row mb-4">
                        <div class="font-mono text-sm"><i class="mr-12 bi bi-telephone-fill"></i></div>
                        <div class="font-mono text-sm" id="foot_nomor_telepon"></div>
                    </div>
                    <div class="flex flex-row mb-4">
                        <div class="font-mono text-sm"><i class="mr-12 bi bi-envelope-at-fill"></i></div>
                        <div class="font-mono text-sm" id="foot_email_sekolah"></div>
                    </div>
                    <div class="flex flex-row mb-4">
                        <div class="font-mono text-sm"><i class="mr-12 bi bi-pin-map-fill"></i></div>
                        <div class="font-mono text-sm" id="foot_alamat_sekolah">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tengah -->
            <!-- Start Kanan -->
            <div class="flex px-4 lg:w-full md:w-full sm:w-full">
                <div class="flex flex-col justify-center px-4 py-4">
                    <div class="flex pb-4 font-mono text-2xl">
                        Lokasi SMK Negeri 3 Banjar
                    </div>
                    <div class="text-sm text-justify text-white">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2194.026231572969!2d108.63523892860643!3d-7.351866546620599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7d197699ecd7%3A0x420255777005d790!2sSMK%20Negeri%203%20Banjar!5e0!3m2!1sid!2sid!4v1698071026729!5m2!1sid!2sid"
                            width="" height="" style="border:1;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!-- End Kanan -->
        </div>
    </div>
</footer>
@push('jsexternal')
<script type="text/javascript">
    var storagePath = "{!! asset('storage/images') !!}";
</script>
<script src="{{ url('') }}/jsusers/home/settings.js"></script>
@endpush
