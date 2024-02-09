<x-app-layout>
{{--    @dd($category)--}}
    <div class="flex gap-4 h-[500px]">
        <div class="flex-1 h-full bg-white rounded-[2.5rem] p-10 relative">
            <h2 class="text-stone-700 text-xl font-bold">Apply filters</h2>
            <p class="mt-1 text-sm">Use filters to further refine search</p>
            <form action="{{route('admin.frontDesk.index')}}" method="GET">
                @csrf
                <div class="flex flex-col gap-8">
                    <div class="flex gap-8 mt-6">
                        <div>
                            <h1 class="mb-4 text-sm font-medium text-gray-500">Room Categories</h1>
                            <div class="flex">
                                <div class="flex items-center me-4">
                                    <input id="single-radio" type="radio" name="category" value="single" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" {{$category == 'single' ? 'checked': ''}} >
                                    <label for="single-radio" class="ms-2 text-sm font-medium text-gray-400">Single</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input id="double-radio" type="radio" name="category" value="double" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" {{$category == 'double' ? 'checked': ''}}>
                                    <label for="double-radio" class="ms-2 text-sm font-medium text-gray-400">Double</label>
                                </div>
                                <div class="flex items-center me-4">
                                    <input id="family-radio" type="radio" name="category" value="family" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" {{$category == 'family' ? 'checked': ''}}>
                                    <label for="family-radio" class="ms-2 text-sm font-medium text-gray-400">Family</label>
                                </div>
                            </div>
                        </div>
                        <label for="roomtype" class="block mb-4 text-sm font-medium text-gray-500 flex-1 ">Select Room
                            Type
                            <select name="roomtype" id="roomtype"
                                    class="bg-gray-50 mt-4 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" {{$roomType == null ? '': 'selected'}}>Select the room type</option>
                                @foreach($roomtypes as $roomtype)
                                    <option value="{{$roomtype->id}}" {{$roomType == $roomtype->id ? 'selected': ''}}>{{$roomtype->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <x-form.input name="capacity" type="number" label="Capacity" value="{{ $capacity ?? '' }}"/>
                    <x-form.input name="price" type="number" label="Price" value="{{ $value ?? '' }}"/>
                </div>
                <div class="absolute flex gap-5 bottom-8 right-10">
                    <a href="{{route('admin.frontDesk.index')}}" class="active:scale-95 rounded-lg bg-gray-200 px-6 py-3 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</a>
                    <x-form.submit-button value="Apply"/>
                </div>
            </form>
        </div>

        <div class="flex-1 h-full bg-white rounded-[2.5rem] p-10">
            <h1 class="p-2 text-2xl font-bold">Available Rooms</h1>

            <ul class="flex flex-col gap-2 h-[90%] overflow-y-scroll rounded-2xl scrollbar-thin">
                @foreach($rooms as $room)
                <li class="flex gap-2 justify-between items-center bg-gray-100 px-4 py-2 rounded-[2.5rem]">
                    <div class="flex justify-center items-center font-bold text-xl w-16 h-16 rounded-[2.5rem] bg-gray-200">
                     <p>{{$room->room_number}}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Category</h2>
                       <p>{{$room->category}}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Capacity</h2>
                       <p>{{$room->capacity}}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Price</h2>
                       <p>${{$room->price}}</p>
                    </div>
                    <button class="bg-blue-600 text-white rounded-[2rem] px-4 py-4">Book now</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
