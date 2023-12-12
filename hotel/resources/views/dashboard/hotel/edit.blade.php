<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Create Hotel
        </h1>


        <form method="POST" action="{{route('hotel.update', $hotel->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-hotel-input name="hotel_name" :value="$hotel->hotel_name" title="Hotel Name" type="text"/>
            <x-hotel-textarea name="short_description" :value="$hotel->short_description" title="Short Description"/>
            <x-hotel-textarea name="description" :value="$hotel->description" title="Description"/>
            <x-hotel-input name="email" :value="$hotel->email" title="Email" type="email"/>
            <x-hotel-input name="phone" :value="$hotel->phone" title="Phone" type="text"/>
            <x-hotel-input name="address" :value="$hotel->address" title="Address" type="text"/>
            <x-hotel-input name="city" :value="$hotel->city" title="City" type="text"/>
            <x-toggle :checker="$hotel->active ? 'checked' : '' "/>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-5">Edit Hotel</button>
        </form>

    </div>
</x-app-layout>
