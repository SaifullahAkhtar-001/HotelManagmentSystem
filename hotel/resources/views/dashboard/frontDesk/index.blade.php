<x-app-layout>
    <div class="flex gap-4 h-[500px]">
        <div class="flex-1 h-full bg-white rounded-[2.5rem] p-10">
            
        </div>

        <div class="flex-1 h-full bg-white rounded-[2.5rem] p-10">
            <h1 class="p-2 text-2xl font-bold">Available Rooms</h1>
            <ul class="flex flex-col gap-2 h-[90%] overflow-y-scroll rounded-2xl scrollbar-hide">
                <li class="flex gap-2 justify-between items-center bg-blue-100 px-4 py-2 rounded-[2.5rem]">
                    <img src="{{ asset('images/room.jpg') }}" alt="room" class="h-16 w-16 object-cover rounded-[2.5rem]">
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Room No</h2>
                       <p>101</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Status</h2>
                       <p>Available</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Price</h2>
                       <p>$300</p>
                    </div>
                    <button class="bg-blue-500 text-white rounded-[2rem] px-4 py-4">Book now</button>
                </li>
                <li class="flex gap-2 justify-between items-center bg-blue-100 px-4 py-2 rounded-[2.5rem]">
                    <img src="{{ asset('images/room.jpg') }}" alt="room" class="h-16 w-16 object-cover rounded-[2.5rem]">
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Room No</h2>
                       <p>101</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Status</h2>
                       <p>Available</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Price</h2>
                       <p>$300</p>
                    </div>
                    <button class="bg-blue-500 text-white rounded-[2rem] px-4 py-4">Book now</button>
                </li>
                <li class="flex gap-2 justify-between items-center bg-blue-100 px-4 py-2 rounded-[2.5rem]">
                    <img src="{{ asset('images/room.jpg') }}" alt="room" class="h-16 w-16 object-cover rounded-[2.5rem]">
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Room No</h2>
                       <p>101</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Status</h2>
                       <p>Available</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold">Price</h2>
                       <p>$300</p>
                    </div>
                    <button class="bg-blue-500 text-white rounded-[2rem] px-4 py-4">Book now</button>
                </li>

            </ul>
        </div>
    </div>
</x-app-layout>
