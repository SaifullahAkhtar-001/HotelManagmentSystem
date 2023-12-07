<x-app-layout>
<div class="max-w-7xl  mx-auto">
    <h1 class="text-4xl my-12 font-bold">
        Create Hotel
    </h1>


    <form method="POST" action="{{route('hotel.store')}}" class="max-w-4xl">
        @csrf

        <x-hotel-input name="hotel_name" title="Hotel Name" type="text"/>
        <x-hotel-textarea name="short_description" title="Short Description"/>
        <x-hotel-textarea name="description" title="Description"/>
        <x-hotel-input name="email" title="Email" type="email"/>
        <x-hotel-input name="phone" title="Phone" type="text"/>
        <x-hotel-input name="address" title="Address" type="text"/>
        <x-hotel-input name="city" title="City" type="text"/>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Hotel</button>
    </form>

</div>
</x-app-layout>
