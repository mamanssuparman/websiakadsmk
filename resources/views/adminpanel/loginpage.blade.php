<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Home | SMK Negeri 3 Banjar</title>
</head>

<body class="bg-gray-100">
    <section class="flex flex-row justify-center mx-auto">
        <div class="container w-[480px] h-[426px] bg-white rounded-3xl mt-20 px-4 py-4 shadow-md">
            <div class="flex flex-col justify-center w-full h-full mx-auto ">
                <div class="flex justify-center">
                    <img src="/images/logosmk.png" alt="" class="w-[40px]">
                </div>
                <div class="flex flex-col px-10">
                    <div class="font-semibold text-slate-800">
                        Email
                    </div>
                    <div>
                        <input type="text" name="" id="" class="w-full h-8 bg-white rounded-md border-slate-400 text-slate-800">
                    </div>
                </div>
                <div class="flex flex-col px-10 mt-2">
                    <div class="font-semibold text-slate-800">
                        Password
                    </div>
                    <div>
                        <input type="password" name="" id="" class="w-full h-8 bg-white rounded-md border-slate-400 text-slate-800">
                    </div>
                </div>
                <div class="flex flex-col px-10 mt-4">
                    <div>
                        <a href="">
                            <button class="w-full h-10 font-semibold text-white bg-blue-800 rounded-md hover:bg-blue-900">LOGIN</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="/../../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
