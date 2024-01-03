<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Regular.woff') }}" type="font/woff" crossorigin>
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Regular.woff2') }}" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Medium.woff') }}" type="font/woff" crossorigin>
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Medium.woff2') }}" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Bold.woff') }}" type="font/woff" crossorigin>
    <link rel="stylesheet" href="{{ asset('fonts/Inter-Bold.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .button-color {
        background-color: {{$website_settings->button_color}}

    }

    .button-color:hover {
        background-color: blue;
    }

    .hr-color {
        border-color: {{$website_settings->hr_color}}
    }
</style>
<body class="font-inter text-gray-700 antialiased">

<div>

    @include('public.sections.head-section')
    @if($website_settings->show_interior)
        @include('public.sections.interior-section')
    @endif
    @if($website_settings->show_amenities)
        @include('public.sections.amenities-section')
    @endif
    @if($website_settings->show_room)
        @include('public.sections.rooms-section')
    @endif
    @include('public.sections.testimonial-section')
    @include('public.sections.footer-section')
</div>

</body>
</html>
