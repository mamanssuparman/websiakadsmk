@extends('frontend.layouts.layoutusers')
@push('jscssexternal')
<script src="/assetsusers/jquery-3.7.0.js"></script>
<script src="/assetsusers/jquery.dataTables.min.js"></script>
<script src="/assetsusers/dataTables.tailwindcss.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="/assetsusers/dataTables.tailwindcss.min.css">
@endpush
@section('content')
    <!-- nav title -->
    <section class="mt-24">
        <div class="p-5 text-center bg-blue-900">
            <h1 class="text-2xl font-semibold text-white">Guru dan Tenaga Pendidik</h1>
        </div>
    </section>
    <!--end nav title -->


    <!-- Start GTK detail -->
    <div class="flex flex-row">
        <div class="w-full px-10 py-10 overflow-x-auto snap-x scroll-smooth scrollbar-hidden">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>-</th>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="/images/contohfoto.jpg" alt="" class="w-40 rounded-md shadow-md">
                        </td>
                        <td>12099900</td>
                        <td>9898980989</td>
                        <td>Nama Pegawai, S.Pd</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="/images/contohfoto.jpg" alt="" class="w-40 rounded-md shadow-md">
                        </td>
                        <td>12099900</td>
                        <td>9898980989</td>
                        <td>Nama Pegawai, S.Pd</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="/images/contohfoto.jpg" alt="" class="w-40 rounded-md shadow-md">
                        </td>
                        <td>12099900</td>
                        <td>9898980989</td>
                        <td>Nama Pegawai, S.Pd</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="/images/contohfoto.jpg" alt="" class="w-40 rounded-md shadow-md hover:cursor-pointer" data-modal-target="default-modal" data-modal-toggle="default-modal">
                        </td>
                        <td>12099900</td>
                        <td>9898980989</td>
                        <td>Nama Pegawai, S.Pd</td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
    <!-- end Article detail -->

    {{-- Start Modal View Detail GTK --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Detail Biodata GTK
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex flex-col">
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">NIP</div>
                                <div class="flex w-full px-4">Kanan</div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">NUPTK</div>
                                <div class="flex w-full px-4">Kanan</div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">Nama</div>
                                <div class="flex w-full px-4">Kanan</div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">Mapel Ajar</div>
                                <div class="flex w-full px-4">Kanan</div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">Jabatan</div>
                                <div class="flex w-full px-4">Guru</div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row w-full">
                                <div class="flex w-full px-4">Tugas Tambahan</div>
                                <div class="flex w-full px-4">Guru</div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b ">
                    <button data-modal-hide="default-modal" type="button" class="px-4 py-2 text-white bg-green-700 rounded-md ">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal View Detail GTK --}}
@endsection
@push('jsexternal')
<script type="text/javascript">
    $('#example').DataTable();
</script>
@endpush
