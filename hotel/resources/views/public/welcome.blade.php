<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">

<div>

    @include('public.sections.head-section')
    @include('public.sections.interior-section')
    @include('public.sections.amenities-section')
    @include('public.sections.rooms-section')
    @include('public.sections.testimonial-section')
    @include('public.sections.footer-section')
</div>

</body>
</html>
