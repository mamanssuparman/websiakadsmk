<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="/dist/output.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @stack('csjsexternal')
    <style>
        .scrollbar-hidden::-webkit-scrollbar {
        display: none;
    }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body class="bg-gray-100">
    {{-- Start Navigation Atas --}}
    @include('adminpanel.includes.navbar')
    {{-- End Navigation Atas --}}

    {{-- Start Aside Menu --}}
    @include('adminpanel.includes.asidemenu')
    {{-- End Aside Menu --}}

    {{-- Start Content Body --}}
    <div class="sm:ml-60">
        @include('adminpanel.includes.headbody')

        @yield('content')
    </div>
    {{-- End Contet Body --}}

    <script type="text/javascript">
        new DataTable('#example');
    </script>
    @stack('jsexternal')
</body>

</html>
