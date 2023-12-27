<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Edit Hotel
        </h1>


        <form method="POST" action="{{route('hotels.update', $hotel->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-hotel-input name="hotel_name" :value="$hotel->hotel_name" title="Hotel Name" type="text"/>
            <x-hotel-textarea name="short_description" :value="$hotel->short_description" title="Short Description"/>
            <x-hotel-textarea name="description" :value="$hotel->description" title="Description"/>
            <x-hotel-input name="email" :value="$hotel->email" title="Email" type="email"/>
            <x-hotel-input name="phone" :value="$hotel->phone" title="Phone" type="text"/>
            <x-hotel-input name="address" :value="$hotel->address" title="Address" type="text"/>
            <x-hotel-input name="city" :value="$hotel->city" title="City" type="text"/>
            <label for="facilities" class="block mb-2 text-sm font-medium text-gray-900">Facilities:</label>
            @foreach($facilities as $facility)
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" {{ in_array($facility->id, $hotel->facilities->pluck('id')->toArray()) ? 'checked' : '' }} class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-orange-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 me-2">{{ $facility->name }}</span>
                </label>
            @endforeach
            <x-toggle :checker="$hotel->active ? 'checked' : '' "/>
            <x-form.submit-button value="Edit Hotel" />
        </form>

    </div>
</x-app-layout>
