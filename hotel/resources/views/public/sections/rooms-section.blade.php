<div class="h-fit border-b-2 pb-24 max-md:mx-4" id="room">
    <x-subsection-header heading="Our Rooms"
        description="Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space." />
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        @foreach($room_types as $room_type)
            <x-room-card :room="$room_type" />
        @endforeach
    </div>
</div>
