<div class="h-fit border-b-2 ">
    <x-subsection-header
        heading="Interior"
        :description="$hotel->interior['description']"
    />
    @if($website_settings->interior_display_format == 'carousal')
        <x-interior.carousal :website_settings="$website_settings" />
    @elseif($website_settings->interior_display_format == 'gallery')
        <x-interior.img-gallery :website_settings="$website_settings"/>
    @endif
</div>
