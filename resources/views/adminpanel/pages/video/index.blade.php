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
                    <table id="example" class="w-full bg-white border rounded-md display border-slate-300">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Video</th>
                              <th>Status</th>
                              <th>Option</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>
                                    <div class="w-40 h-24 overflow-hidden rounded-md">
                                        <iframe class="object-cover w-full h-full transition ease-out rounded-md sm:h-42 hover:scale-105 hover:rounded-none" src="https://www.youtube.com/embed/5V4ZgeoUZ-c?si=SVnoSEZ6hVyNJnsT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                              </td>
                              <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                              </td>
                              <td>
                                  <a href="">
                                      <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>
                                    <div class="w-40 h-24 overflow-hidden rounded-md">
                                        <iframe class="object-cover w-full h-full transition ease-out rounded-md sm:h-42 hover:scale-105 hover:rounded-none" src="https://www.youtube.com/embed/5V4ZgeoUZ-c?si=SVnoSEZ6hVyNJnsT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                              </td>
                              <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                              </td>
                              <td>
                                  <a href="">
                                      <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>
                                    <div class="w-40 h-24 overflow-hidden rounded-md">
                                        <iframe class="object-cover w-full h-full transition ease-out rounded-md sm:h-42 hover:scale-105 hover:rounded-none" src="https://www.youtube.com/embed/5V4ZgeoUZ-c?si=SVnoSEZ6hVyNJnsT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                              </td>
                              <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                              </td>
                              <td>
                                  <a href="">
                                      <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                                  </a>
                              </td>
                          </tr>

                        </tbody>
                    </table>
                  </div>
            </div>
            <div class="w-full border rounded-md sm:flex-1 border-slate-300 p-9 ">
                <form action="">
                    <div class="mb-5">
                        <label for="judulVido" class="block">Judul Video</label>
                        <input id="judulVido" name="judulVideo" type="text" class="w-full border rounded-lg border-slate-300">
                    </div>
                    <div class="mb-5">
                        <label  for="deskripsi" class="block ">Deskripsi / Keterangan</label>
                        <textarea id="deskripsi" name="deskripsi" class="w-full p-3 rounded-lg border-slate-300" rows="6"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="embededYoutube" class="block">Embeded Youtube</label>
                        <input id="embededYoutube" name="embededYoutube" type="text" class="w-full border rounded-lg border-slate-300">
                    </div>
                    <div class="flex justify-end">
                        <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-lg mt-9 hover:bg-blue-800"><i class="bi bi-plus"></i> Add Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

