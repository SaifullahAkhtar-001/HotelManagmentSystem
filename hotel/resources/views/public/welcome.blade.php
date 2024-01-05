<x-public-layout :website_settings="$website_settings">
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
</x-public-layout>
