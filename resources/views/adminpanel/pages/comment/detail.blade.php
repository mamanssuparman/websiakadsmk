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
            <div>
                <a href="{{ url('admin') }}/comment" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="bg-white border-2 border-dashed rounded-md">
            <div class="overflow-x-auto">
                <table class="mb-10 text-sm">
                    <tr class="text-left">
                        <th class="px-6 py-3 w-44">Nama Pengirim</th>
                        <td class="pl-0">: Omen</td>
                    </tr>
                    <tr class="text-left">
                        <th class="w-48 px-6 py-3">Email</th>
                        <td class="pl-0">: Omen@gmail.com</td>
                    </tr>
                    <tr class="text-left">
                        <th class="w-48 px-6 py-3">Article</th>
                        <td class="pl-0">: PPDB 2025</td>
                    </tr>
                    <tr class="text-left">
                        <th class="w-48 px-6 py-3">Isi Commentar</th>
                        <td class="pl-2 pr-9">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Temporibus ducimus obcaecati, non eius ratione optio ipsum
                            debitis accusantium dolorem maxime molestias id fugiat quos
                            nisi vero velit nobis. Sequi, totam facilis quo dolorem
                            adipisci dolorum dignissimos, inventore eaque error harum
                            consequatur ratione debitis. Aspernatur, temporibus.
                            Blanditiis repellendus atque dolorum cum!
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="flex justify-end mt-8">
            <button type="button"
                class="px-4 py-2 mb-2 mr-2 text-sm font-medium text-white bg-red-600 rounded-lg focus:outline-none hover:bg-red-700">
                X <span class="ml-3 font-semibold">Tolak</span>
            </button>
            <button type="button"
                class="px-4 py-2 mb-2 mr-2 text-sm font-medium text-white bg-green-600 rounded-lg focus:outline-none hover:bg-green-700">
                + <span class="ml-3 font-semibold">Approve</span>
            </button>
        </div>
    </div>
@endsection
