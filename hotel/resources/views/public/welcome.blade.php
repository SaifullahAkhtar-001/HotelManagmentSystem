<x-public-layout :website_settings="$website_settings">
    @if($hotel)
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
    @else
        <div class="flex justify-center items-center h-screen">
        <h1 class="text-4xl text-center">No Available Right Now</h1>
    @endif
</x-public-layout>
