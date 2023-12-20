<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css"/>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="{ isOpen: false, buttonVisible: true }">
<a href="{{route('home')}}"
    class="bg-blue-900 shadow-2xl backdrop-filter backdrop-blur-md bg-opacity-25 transition-all z-[1001] fixed hover:bg-opacity-70 bottom-4 text-sm right-2 p-4 rounded-full font-bold hover:text-blue-50">
    Visit Website
</a>
<div class="md:flex  m-0 p-0 min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main class="md:flex-1 md:ml-56 p-6">
        <x-flash/>
        {{ $slot }}
    </main>
</div>

</body>
</html>
