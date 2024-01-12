<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Room" subTitle="Here You Will Edit Your Room!"/>
        <form method="POST" action="{{route('rooms.update', $room->id)}}" class="flex flex-col gap-4" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="flex gap-3">
                <x-form.input :value="$room->room_number" name="room_number" type="text" label="Room Number"/>
                <x-form.input :value="$room->description" name="description" type="text" label="Description"/>
            </div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Select Status
                <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </label>

            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="room_img" id="example1" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
            </div>
            @error('room_img')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-image-preview :images="$room->imggallery"/>
            <x-form.submit-button value="Save" />
        </form>

    </div>
</x-app-layout>
