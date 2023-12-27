@if($website_settings->booking_filter_layout == '1')
    <x-layout.room-filter-layout-1 />
@elseif($website_settings->booking_filter_layout == '2')
    <x-layout.room-filter-layout-2 />
@endif
