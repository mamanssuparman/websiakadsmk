@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="/assetsadmin/js/jquery.dataTables.min.js"></script>
    <script src="/assetsadmin/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assetsadmin/css/dataTables.tailwindcss.min.css">
    <style>
        #toggle {
            position: absolute;
            width: 30px;
            height: 20px;
            background-color: rgb(175, 26, 26);
            /* -webkit-appearance: none; */
            outline: none;
            box-shadow: 0 2px 7px #fff;
            border-radius: 20px;
            transition: background 0.9s;
        }

        #toggle:checked {
            background-color: rgb(17, 126, 84);
        }

        #toggle::before {
            content: '';
            position: absolute;
            top: 2.3px;
            left: 2px;
            background-color: #fff;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            transition: 0.5s;
        }

        #toggle:checked::before {
            left: 13px;
        }
    </style>
@endpush
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-wrap mt-5 gap-9">
            <div class="w-full sm:w-1/2">
                <div class="overflow-y-auto">
                    <table id="example2" class="w-full bg-white border rounded-md display border-slate-300">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Video</th>
                              <th>Status</th>
                              <th>Option</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
            </div>
            <div class="w-full border rounded-md sm:flex-1 border-slate-300 p-9 ">
                <form action="{{ route('save.data') }}" method="post" id="form-id">
                    <input type="hidden" name="idVideo" id="idVideo">
                    <div class="mb-5">
                        <label for="judul" class="block">Judul Video</label>
                        <input id="judul" name="judul" type="text" class="w-full border rounded-lg border-slate-300">
                        <small id="judulError" class="error-messages italic text-yellow-500"></small>
                    </div>
                    <div class="mb-5">
                        <label for="jenis" class="block" >Jenis</label>
                        <select name="jenis" id="jenis" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected value="">--Pilih Jenis Media--</option>
                            <option value="Gallery">Gallery</option>
                            <option value="Video">Video</option>
                        </select>
                        <small id="jenisError" class="error-messages italic text-yellow-500"></small>
                    </div>
                    <div class="mb-5">
                        <label for="urlvideo" class="block">Embeded Youtube</label>
                        <input id="urlvideo" name="urlvideo" type="text" class="w-full border rounded-lg border-slate-300">
                        <small id="urlvideoError" class="error-messages italic text-yellow-500"></small>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" id="btn-add-edit" class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-lg mt-9 hover:bg-blue-800"><i class="bi bi-plus"></i> Add Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('jsexternal')
    <script src="/jsadmin/video/index.js"></script>
@endpush

