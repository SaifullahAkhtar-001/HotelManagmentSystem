<div class="h-fit border-b-2 ">
    <x-subsection-header
        heading="Interior"
        description="Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space."
    />
    @if($website_settings->interior_display_format == 'carousal')
        <x-interior.carousal :website_settings="$website_settings" :interior="$interior" />
    @elseif($website_settings->interior_display_format == 'gallery')
        <x-interior.img-gallery :website_settings="$website_settings" :interior="$interior"/>
    @endif
</div>
