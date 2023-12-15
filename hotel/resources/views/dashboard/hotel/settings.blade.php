<x-hotelSettingsSection>
    <div class="flex-col gap-4">
        <h1 id="general" class="text-4xl my-8 font-bold ">
            Settings
        </h1>
        @foreach( $errors->all() as $errors)
            <p>{{$errors}}</p>
        @endforeach
        <form action="{{ route('hotels.save') }}" method="post">
            @csrf
            <div class="text-2xl mb-4 font-semibold">General Settings</div>
            <x-hotel-input name="hotel_name" :value="$hotels->hotel_name" title="Hotel Name" type="text" />
            <x-hotel-textarea name="short_description" :value="$hotels->short_description" title="Short Description" />
            <x-hotel-textarea name="description" :value="$hotels->description" title="Description" />
            <x-hotel-textarea name="about" :value="$hotels->about" title="About" />
            <x-hotel-input name="email" :value="$hotels->email" title="Email" type="email" />
            <x-hotel-input name="phone" :value="$hotels->phone" title="Phone" type="text" />
            <x-hotel-input name="address" :value="$hotels->address" title="Address" type="text" />
            <x-hotel-input name="city" :value="$hotels->city" title="City" type="text" />
            {{-- Interior Block --}}
            <div id="interior" class="text-2xl mb-4 underline font-semibold">Interior Settings</div>
            <x-hotel-textarea name="interior_description" :value="$hotels->interior['description']" title="Description" />
            {{-- Amenities Block --}}
            <div id="amenities" class="text-2xl mb-4 underline font-semibold">Amenities Settings</div>
            <x-hotel-textarea name="amenities_description" :value="$hotels->amenities['description']" title="Description" />

            <div class="text-xl mb-4 font-medium">1_ Amenity</div>
            <x-hotel-input name="amenity1" :value="$hotels->amenities['amenity1']" title="Title" type="text" />
            <x-hotel-textarea name="amenity1_description" :value="$hotels->amenities['amenity1_description']" title="Description" />

            <div class="text-xl mb-4 font-medium">2_ Amenity</div>
            <x-hotel-input name="amenity2" :value="$hotels->amenities['amenity2']" title="Title" type="text" />
            <x-hotel-textarea name="amenity2_description" :value="$hotels->amenities['amenity2_description']" title="Description" />

            <div class="text-xl mb-4 font-medium">3_ Amenity</div>
            <x-hotel-input name="amenity3" :value="$hotels->amenities['amenity3']" title="Title" type="text" />
            <x-hotel-textarea name="amenity3_description" :value="$hotels->amenities['amenity3_description']" title="Description" />

            <div class="text-xl mb-4 font-medium">4_ Amenity</div>
            <x-hotel-input name="amenity4" :value="$hotels->amenities['amenity4']" title="Title" type="text" />
            <x-hotel-textarea name="amenity4_description" :value="$hotels->amenities['amenity4_description']" title="Description" />

            <x-submit-button value="Save" />
        </form>
    </div>
</x-hotelSettingsSection>
