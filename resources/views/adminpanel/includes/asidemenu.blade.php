<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ url('admin') }}/dashboard" class="flex items-center p-2 rounded-lg text-slate-900 hover:bg-gray-100 group {{ $head == 'Dashboard' ? 'bg-gray-200' : '' }}">
                    <i class="font-semibold bi bi-columns-gap text-slate-900"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li class="w-full h-[1px] bg-slate-200">
            </li>
            <li class="ml-2 text-slate-300">
                <span>Master</span>
            </li>
            <li>
                <a href="{{ url('admin') }}/profile" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Profile' ? 'bg-gray-200' : '' }}">
                    <i class="font-semibold bi bi-building-gear text-slate-900"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/gtk" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'GTK' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-people-fill text-slate-900"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">GTK</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/mapel" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Mata Pelajaran' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-archive text-slate-900"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap text-slate-900">Mapel</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/prodi" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Program Studi' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-signpost-2 text-slate-900"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap text-slate-900">Program Studi</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/ekstrakurikuler" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Ekstrakurikuler' ? 'bg-gray-200' : '' }} ">
                    <i class="text-slate-900 bi bi-tools"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap text-slate-900">Ekstrakurikuler</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/banner" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Banner' ? 'bg-gray-200' : '' }} ">
                    <i class="text-slate-900 bi bi-aspect-ratio"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap text-slate-900">Banners</span>
                </a>
            </li>
            <li class="w-full h-[1px] bg-slate-200"></li>
            <li class="ml-2 text-slate-300">
                Article / Berita
            </li>
            <li>
                <a href="{{ url('admin') }}/categoryarticle" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Category Article' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-clipboard-pulse"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Category Article</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/article" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Article' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-postcard-heart-fill"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Article</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/comment" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Comments' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-chat-square-text-fill"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Comments</span>
                </a>
            </li>
            <li class="h-[1px] w-full bg-slate-300"></li>
            <li class="ml-2 text-slate-300">
                Media
            </li>
            <li>
                <a href="{{ url('admin') }}/gallery" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Gallery' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-film"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Gallery</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin') }}/video" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Video' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-camera-reels"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Video</span>
                </a>
            </li>
            <li class="h-[1px] w-full bg-slate-300"></li>
            <li>
                <a href="{{ url('admin') }}/profileuser" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Profile User' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile User</span>
                </a>
            </li>
            <li class="h-[1px] w-full bg-slate-300"></li>
            <li>
                <a href="{{ url('admin') }}/settings" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ $head == 'Settings' ? 'bg-gray-200' : '' }} ">
                    <i class="bi bi-gear-fill"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
