<x-app-layout>
        <div class="flex mx-4 justify-between items-center pb-8 text-4xl">
            <h1>Rooms</h1>
            <a href="{{route('admin.rooms.create')}}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Add
                Room</a>
        </div>
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
            <table class="w-full border-collapse text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class=" px-6 py-4 font-medium text-gray-900">Room Number</th>
                    <th scope="col" class="max-md:hidden px-6 py-4 font-medium text-gray-900">Description</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Room Type</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th scope="col" class="max-md:hidden px-6 py-4 font-medium text-gray-900">Size</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($rooms as $room)
                        <x-tablerow.room :room="$room"/>
                    @endforeach
                </tbody>
            </table>

        </div>


</x-app-layout>
