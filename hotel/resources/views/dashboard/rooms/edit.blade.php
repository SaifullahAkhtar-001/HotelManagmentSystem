<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Room" subTitle="Here You Will Edit Your Room!"/>
        <form method="POST" action="{{route('rooms.update', $room->id)}}" class="flex flex-col gap-4">
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
            <x-form.submit-button value="Save" />
        </form>

    </div>
</x-app-layout>
