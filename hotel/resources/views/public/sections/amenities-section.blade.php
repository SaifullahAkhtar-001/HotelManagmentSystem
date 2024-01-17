<div class="h-fit border-b-2 pb-24">
    <x-subsection-header
        heading="Amenities"
        :description="$hotel->amenities['description']"
    />
    @include('components.amenity.cards-grid')
</div>
