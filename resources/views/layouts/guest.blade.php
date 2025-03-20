<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/css/all.min.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class=" min-h-screen flex justify-center items-center  bg-gray-200">


        <div class="relative w-[90%] md:w-2/3 lg:w-xl   px-10 pt-20 pb-6  bg-white  shadow-md  rounded-lg">
            <div class="absolute   -top-15 left-1/2 -translate-x-1/2 z-50">
                <a class="" href="/">
                    <x-application-logo class=" " />
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
