<x-app-layout>

    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Create Room" subTitle="Here You Will Add Your Available Room!"/>
        <form method="POST" action="{{route('rooms.store')}}" class="flex flex-col gap-4">
            @csrf
            <label for="hotel_id" class="block mb-2 text-sm font-medium text-gray-900 ">Select the Hotel
                <select id="hotel_id" name="hotel_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="room_type_id" class="block mb-2 text-sm font-medium text-gray-900 ">Select the Hotel
                <select name="room_type_id" id="room_type_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>
            </label>

            <div class="flex gap-3">
                <x-form.input name="room_number" type="text" label="Room Number" class="w-32" />
                <x-form.input name="description" type="text" label="Description" class="flex-1" />
            </div>

            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Select Status
                <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </label>
            <x-form.submit-button value="Create Room"/>
        </form>

    </div>

</x-app-layout>
