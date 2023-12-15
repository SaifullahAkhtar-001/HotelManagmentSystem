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

            <x-hotel-input name="room_number" value="" title="Room Name" type="integer"/>
            <x-hotel-textarea name="description" value="" title="Description" type="string"/>
            <x-hotel-textarea name="price" value="" title="Price" type="text"/>
            
            
            
    
                    <x-toggle checker=""/>
                    <x-submit-button value="Create Room" />
        </form>

    </div>
</x-app-layout>
