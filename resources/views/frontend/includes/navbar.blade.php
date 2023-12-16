<div class="fixed z-50 flex">
    <nav class="fixed top-0 z-20 w-full border-b bg-gray-100/60 backdrop-blur-lg border-gray-200/40">
        <div
            class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 py-2.5 md:px-4 md:py-3.5 mx-auto h-24 sm:h-24 md:h-24">
            <a href="#" class="flex items-center">
                <img src="/images/logosmk.png" class="h-8 mr-3" alt="SMKN3BanjarLogo" />
                <span
                    class="self-center text-xl font-semibold tracking-tighter text-gray-800 max-lg:hidden whitespace-nowrap font-sen">SMKN
                    3 BANJAR</span>
            </a>
            <div class="lg:hidden">
                <span
                    class="self-center text-lg font-semibold tracking-tighter text-gray-800 whitespace-nowrap font-sen">SMKN
                    3 BANJAR</span>
            </div>
            <div class="flex lg:order-2">

                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-1.5 text-sm text-gray-400 rounded-full lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-cta">

                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-200 rounded-lg lg:p-0 bg-gray-50 lg:flex-row lg:space-x-8 lg:mt-0 lg:border-0 lg:bg-transparent font-inter">
                    <li class="relative group">
                        <a href="{{ url('') }}"
                            class="block py-2 pl-3 pr-4 tracking-tight text-white bg-blue-600 rounded lg:bg-transparent lg:text-blue-700 lg:p-0"
                            aria-current="page">Home</a>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-1/2 -translate-x-1/2 lg:bg-blue-600">
                        </div>
                    </li>
                    <li class="relative group">
                        <button id="profile" data-dropdown-toggle="profileNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:p-0 lg:w-auto">
                            Profile
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4 ml-1 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div id="profileNavbar"
                            class="z-10 hidden w-56 font-normal bg-gray-100 border border-gray-200 divide-y divide-gray-200 rounded-lg">
                            <ul class="py-2 text-sm text-gray-700" >
                                <div id="menu_profile">

                                </div>

                            </ul>
                        </div>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-[20%] lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="{{ url('') }}/saranaprasarana"
                            class="block py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0">Sarana</a>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-1/2 -translate-x-1/2 lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                    <li class="relative group">
                        <button id="programStudi" data-dropdown-toggle="programStudiNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:p-0 lg:w-auto">Program
                            Studi
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4 ml-1 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div id="programStudiNavbar"
                            class="z-10 hidden font-normal bg-gray-100 border border-gray-200 divide-y divide-gray-200 rounded-lg w-44">
                            <ul class="py-2 text-sm text-gray-700">
                                <div id="menu_prodi">

                                </div>

                            </ul>
                        </div>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-[35%] lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                    <li class="relative group">
                        <button id="ekstrakurikuler" data-dropdown-toggle="ekstrakurikulerId"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:p-0 lg:w-auto">
                            Ekstrakurikuler
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4 ml-1 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div id="ekstrakurikulerId"
                            class="z-10 hidden font-normal bg-gray-100 border border-gray-200 divide-y divide-gray-200 rounded-lg w-44">
                            <ul class="py-2 text-sm text-gray-700">
                                <div id="menu_ekstra">

                                </div>
                            </ul>
                        </div>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-[35%] lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                    <li class="relative group">
                        <button id="gallery" data-dropdown-toggle="galleryid"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:p-0 lg:w-auto">
                            Gallery
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4 ml-1 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div id="galleryid"
                            class="z-10 hidden font-normal bg-gray-100 border border-gray-200 divide-y divide-gray-200 rounded-lg w-44">
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="{{ url('') }}/gallery"
                                        class="block px-4 py-2 mx-2 transition ease-out rounded-md hover:bg-blue-600 hover:text-gray-50 hover:scale-105">Foto</a>
                                </li>
                                <li>
                                    <a href="{{ url('') }}/video"
                                        class="block px-4 py-2 mx-2 transition ease-out rounded-md hover:bg-blue-600 hover:text-gray-50 hover:scale-105">Video</a>
                                </li>

                            </ul>
                        </div>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-[35%] lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="{{ url('') }}/gtk"
                            class="block py-2 pl-3 pr-4 tracking-tight text-gray-800 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0">GTK</a>
                        <div
                            class="max-lg:hidden absolute w-5 h-[3px] rounded-lg left-1/2 -translate-x-1/2 lg:bg-transparent lg:group-hover:bg-gray-400 transition ease-out">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
