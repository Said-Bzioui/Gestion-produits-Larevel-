<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / icons / Scripts -->
    @vite(['resources/css/app.css', 'resources/css/all.min.css', 'resources/js/app.js'])


</head>

<body class="bg-[#FDFDFC]   flex  min-h-screen ">
    {{-- left side --}}
    <div class="w-32 lg:w-56 min-h-screen  shadow-lg">
        <x-side-bar :page="$page" />
    </div>
    {{-- right side --}}
    <div class=" w-10/12 bg-gray-100 flex flex-col  grow-1 ">
        <x-header />
        {{-- the content --}}
        <div class="m-3 bg-white h-full rounded-md shadow-md p-6">
            @yield('content')
        </div>
    </div>
    {{-- <x-toasts /> --} {{-- toasts --}}
    @if (session('success'))
        <x-toasts message="{{ session('success') }}" />
    @endif


</body>

</html>
