
<x-app-layout>
    
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-8 font-bold">
            Create Room
        </h1>
        @foreach( $errors->all() as $errors)
            <p>{{$errors}}</p>
        @endforeach
        <form method="POST" action="{{route('rooms.store')}}" class="max-w-4xl">
            @csrf
            
                <label for="hotel_id">Select Hotel:</label>
                <select name="hotel_id" id="hotel_id" class="form-control">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            
            
            
            <div class="form-group">
                <label for="room_type_id">Select Room Type:</label>
                <select name="room_type_id" id="room_type_id" class="form-control">
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-hotel-input name="room_number" value="" title="Room Name" type="integer"/>
            <x-hotel-textarea name="description" value="" title="Description" type="string"/>
            <x-hotel-textarea name="price" value="" title="Price" type="text"/>
            <x-toggle checker=""/>
            <x-submit-button value="Create Room"/>
        </form>

    </div>
    
</x-app-layout>
