<x-app-layout>
    <x-form.header title="Create Booking"  subTitle="Book the room for customer"/>
    <form method="POST" action="{{route('admin.booking.store')}}" class="flex flex-col gap-4">
        @csrf
        <input type="hidden" name="room_id" value="{{$room->id}}">
        <div class="flex gap-4">
            <label for="guest_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Guest
                <select id="guest_id" name="guest_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($guests as $guest)
                        <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-500 ">Status
                <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </label>
            <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-500 ">Payment Status
                <select id="payment_status" name="payment_status"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </label>
            <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-500 ">Payment Method
                <select id="payment_method" name="payment_method"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                    <option value="paypal">Paypal</option>
                </select>
            </label>
        </div>
        <div class="flex gap-4">
            <x-form.input type="number" label="nights" name="nights" class="w-36"/>
            <x-form.input type="text" name="payment_payload" label="payment_payload" class="w-56"/>
            <x-form.input type="text" name="payment_amount" label="payment_amount" class="w-56"/>
            <x-form.input type="text" name="payment_currency" label="payment_currency" class="w-56"/>
        </div>
        <div class="flex gap-4 mb-3">
            <x-form.input type="number" min="0" max="4" name="adults" label="adults" class="w-16"/>
            <x-form.input type="number" min="0" max="4" name="children" label="children" class="w-16"/>
        </div>
        <div class="flex gap-3">
            <x-form.input type="datetime-local" name="check_in" label="Check In" class="w-56"/>
            <x-form.input type="datetime-local" name="check_out" label="Check Out" class="w-56"/>
        </div>
        <x-form.submit-button value="Book"/>
    </form>
</x-app-layout>
