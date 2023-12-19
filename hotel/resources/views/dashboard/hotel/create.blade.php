<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-8 font-bold">
            Create Hotel
        </h1>
        @foreach( $errors->all() as $errors)
            <p>{{$errors}}</p>
        @endforeach
        <form method="POST" action="{{route('hotels.store')}}" enctype="multipart/form-data" class="max-w-4xl">
            @csrf

            <x-hotel-input name="hotel_name" value="" title="Hotel Name" type="text"/>
            <x-hotel-textarea name="short_description" value="" title="Short Description"/>
            <x-hotel-textarea name="description" value="" title="Description"/>

{{--            <label>Hotel Image--}}
{{--                <input type="file" name="hotel_img" id="" >--}}
{{--            </label>--}}
            <x-hotel-input name="email" value="" title="Email" type="email"/>
            <x-hotel-input name="phone" value="" title="Phone" type="text"/>
            <x-hotel-input name="address" value="" title="Address" type="text"/>
            <x-hotel-input name="city" value="" title="City" type="text"/>
            <label for="facilities" class="block mb-2 text-sm font-medium text-gray-900">Facilities:</label>
            @foreach($facilities as $facility)
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-orange-600"></div>
                    <span class="ms-3 me-2 text-sm font-medium text-gray-900">{{ $facility->name }}</span>
                </label>
                    @endforeach
                    <x-toggle checker=""/>
                    <x-submit-button value="Create Hotel" />
        </form>

    </div>
</x-app-layout>
