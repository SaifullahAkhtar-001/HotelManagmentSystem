<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Edit Room
        </h1>


        <form method="POST" action="{{route('rooms.update', $room->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-room-input name="Room_number" :value="$room->room_number" title="Room Number" type="text"/>
            <x-room-textarea name="description" :value="$hotel->description" title="Description"/>
            
            <x-hotel-input name="status" :value="$room->status" title="status" type="text"/>
          
            
            <x-submit-button value="Edit Room" />
        </form>

    </div>
</x-app-layout>
