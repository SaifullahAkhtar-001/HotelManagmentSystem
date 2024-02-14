<x-app-layout>

    <div class="max-w-7xl mx-auto">
        <x-form.header title="Create Room" subTitle="Here You Will Add Your Available Room!"/>
        <form method="POST" action="{{route('admin.rooms.store')}}" class="flex flex-col gap-4" enctype='multipart/form-data'>
            @csrf
            <label for="hotel_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Hotel
                <select id="hotel_id" name="hotel_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="room_type_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Room Type
                <select name="room_type_id" id="room_type_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>
            </label>

            <div class="flex gap-3">
                <x-form.input name="room_number" type="number" label="Room Number" class="w-32"/>
                <x-form.input name="description" type="text" label="Description" class="flex-1"/>
            </div>
            <div class="flex max-md:flex-col gap-3">
                <x-form.input name="size" type="number" label="Room Size Per Sqr-ft" class="flex-1"/>
                <x-form.input name="capacity" type="number" label="Capacity" class="flex-1" min="1" max="8"/>
                <x-form.input name="price" type="number" label="Price" class="flex-1"/>
            </div>

            <label for="category" class="block mb-2 text-sm font-medium text-gray-500 ">Select Category
                <select name="category" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="family">Family</option>
                </select>
            </label>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-500 ">Select Status
                <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </label>


            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="room_img" id="example1" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
            </div>
            @error('room_img')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror

            <x-form.submit-button value="Create Room"/>
        </form>

    </div>

</x-app-layout>
