<x-app-layout>
    <div class="flex mx-4 justify-between items-center pb-8 text-4xl">
        <h1>Bookings</h1>
    </div>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Customer Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Room No.</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach($bookings as $booking)
                <x-tablerow.booking :booking="$booking"/>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
