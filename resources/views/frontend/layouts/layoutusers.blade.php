<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="/dist/output.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Home | SMK Negeri 3 Banjar</title>
    <style>
        .scrollbar-hidden::-webkit-scrollbar {
          display: none;
        }
    </style>
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    @stack('jscssexternal')
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <!-- Start Navigation Bar -->
    @include('frontend.includes.navbar')
    <!-- End Navigatiorn Bar -->
    @yield('content')
    <!-- Footer -->
    @include('frontend.includes.footer')
    <!-- Akhir Footer -->
    @stack('jsexternal')
</body>

</html>
