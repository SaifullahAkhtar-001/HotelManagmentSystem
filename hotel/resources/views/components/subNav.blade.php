<nav class="flex border-b-2 w-full p-2 gap-8 items-center">
    <x-subnavlinks path="{{route('hotel-settings.general')}}" title="Hotel General Settings" active="hotel-settings.general"/>
    <x-subnavlinks path="{{route('hotel-settings.interior')}}" title="Hotel Interior Settings" active="hotel-settings.interior"/>
    <x-subnavlinks path="{{route('hotel-settings.amenities')}}" title="Hotel Amenities Settings" active="hotel-settings.amenities"/>
</nav>
