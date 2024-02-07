<x-app-layout>
    <div class="flex gap-4 h-[500px]">
        <div class="flex-1 h-full bg-white rounded-[2.5rem] p-10">
            <div class="m-2 max-w-screen-md">
                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                    <h2 class="text-stone-700 text-xl font-bold">Apply filters</h2>
                    <p class="mt-1 text-sm">Use filters to further refine search</p>
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex flex-col">
                            <label for="name" class="text-stone-600 text-sm font-medium">Name</label>
                            <input type="text" id="name" placeholder="raspberry juice" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="manufacturer" class="text-stone-600 text-sm font-medium">Manufacturer</label>
                            <input type="manufacturer" id="manufacturer" placeholder="cadbery" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="date" class="text-stone-600 text-sm font-medium">Date of Entry</label>
                            <input type="date" id="date" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="status" class="text-stone-600 text-sm font-medium">Status</label>

                            <select id="status" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option>Dispached Out</option>
                                <option>In Warehouse</option>
                                <option>Being Brought In</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                        <button class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>
                        <button class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Search</button>
                    </div>
                </div>
            </div>
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
