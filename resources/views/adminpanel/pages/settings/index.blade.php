@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
@endpush
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
        </div>
    </div>
    <form action="" id="form-settings" enctype="multipart/form-data">
        <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
            {{-- Start Video Profile Sekolah  --}}
            <div class="flex flex-row px-4 py-4 border border-dashed rounded-md">
                <div class="flex justify-center">
                    <iframe src="https://www.youtube.com/embed/" frameborder="1" class="items-center lg:h-[150px] lg:w-auto object-cover transition ease-out hover:scale-105 rounded-md" id="framevideo"></iframe>
                </div>
                <div class="flex w-full ">
                    @csrf
                    <div class="flex flex-col justify-start w-full px-10">
                        <div class="text-slate-800">
                            Judul Video
                        </div>
                        <div>
                            <input type="text" name="judul_video" id="judul_video" class="w-full h-8 rounded-md border-slate-600 text-slate-800">
                        </div>
                        <div class="mt-4 text-slate-800">
                            Url Emebeded Video Youtube
                        </div>
                        <div>
                            <input type="text" name="embeded_video" id="embeded_video" class="w-full h-8 rounded-md border-slate-600 text-slate-800">
                        </div>
                        <div class="mt-4 text-slate-800">
                            Description Video
                        </div>
                        <div>
                            <input type="text" name="description_video" id="description_video" class="w-full h-8 rounded-md border-slate-600 text-slate-800">
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Video Profile Sekolah --}}
            {{-- Start Sambutan kepala sekolah  --}}
            <div class="flex flex-row px-4 py-4 mt-4 border border-dashed rounded-md">
                <div class="flex justify-center">
                    <div class="w-40 bg-gray-100 rounded-md h-52">
                        <img src="" alt="" class="overflow-hidden shadow-lg borderrounded-md border-spacing-4" id="thumbnail_foto_kepala">
                    </div>
                </div>
                <div class="flex w-full ">
                    <div class="flex flex-col justify-start w-full px-10">
                        <div class="flex text-slate-800">
                            Kepala Sekolah
                        </div>
                        <div>
                            <input type="file" name="photo_kepala" id="photo_kepala" class="w-full h-8 rounded-md">
                        </div>
                        <div class="flex mt-4 text-slate-800">
                            Judul Sambutan
                        </div>
                        <div>
                            <input type="text" name="judul_sambutan" id="judul_sambutan" class="w-full h-8 rounded-md text-slate-800 border-slate-600">
                        </div>
                        <div class="mt-4 text-slate-800">
                            Isi Sambutan
                        </div>
                        <div>
                            <textarea name="isi_sambutan" id="isi_sambutan" cols="30" rows="5" class="w-full rounded-md border-slate-600 text-slate-800"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            {{-- End Sambutan kepala sekolah --}}
            {{-- Start Detail Information  --}}
            <div class="flex flex-col px-4 py-4 mt-4 border border-dashed rounded-md">
                <div class="flex flex-items">
                    Nomor Telepon
                </div>
                <div class="flex flex-items">
                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="w-full h-8 px-2 py-1 rounded-md border-slate-600 text-slate-800">
                </div>
                <div class="flex mt-4 flex-items">
                    Alamat Sekolah
                </div>
                <div class="flex flex-items">
                    <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="w-full h-8 px-2 py-1 rounded-md border-slate-600 text-slate-800">
                </div>
                <div class="flex mt-4 flex-items">
                    Email Sekolah
                </div>
                <div class="flex flex-items">
                    <input type="email" name="email_sekolah" id="email_sekolah" class="w-full h-8 px-2 py-1 rounded-md border-slate-600 text-slate-800">
                </div>
                <div class="flex mt-4 flex-items">
                    URL Map Sekolah
                </div>
                <div class="flex flex-items">
                    <input type="text" name="url_map_sekolah" id="url_map_sekolah" class="w-full h-8 px-2 py-1 rounded-md border-slate-600 text-slate-800">
                </div>
                <div class="flex flex-row justify-between mt-4">
                    <div></div>
                    <div>
                        <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-800 rounded-md" id="btn_simpan"><i class="bi bi-save"></i> Simpan</button>
                        <button type="submit" class="px-4 py-2 font-semibold text-white bg-green-600 rounded-md" id="btn_update">Update</button>
                    </div>
                </div>
            </div>
            {{-- End Detail Information --}}
        </div>
    </form>
@endsection
@push('jsexternal')
    <script src="/jsadmin/settings/index.js"></script>
@endpush

