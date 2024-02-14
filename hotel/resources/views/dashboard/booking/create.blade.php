<x-app-layout>
    <x-form.header title="Create Booking"  subTitle="fjhfkhka"/>
    <form method="POST" action="{{route('admin.booking.store')}}" class="flex flex-col gap-4" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="room_id" value="{{$room->id}}">
        <label for="room_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Guest
            <select id="room_id" name="room_id"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                @foreach($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                @endforeach
            </select>
        </label>
        <x-form.input type="number" label="nights" name="nights" class="w-36"/>
        <label for="status">Status</label><select name="status" id="status" class="w-56">
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <label for="payment_status">Payment Status</label><select name="payment_status" id="payment_status" class="w-56">
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <label for="payment_method">Payment Method</label><select name="payment_method" id="payment_method" class="w-56">
            <option value="cash">Cash</option>
            <option value="card">Card</option>
            <option value="paypal">Paypal</option>
            </select>

        <x-form.input type="text" name="payment_payload" label="payment_payload" class="w-56"/>
        <x-form.input type="text" name="payment_response" label="payment_response" class="w-56"/>
        <x-form.input type="text" name="payment_amount" label="payment_amount" class="w-56"/>
        <x-form.input type="text" name="payment_currency" label="payment_currency" class="w-56"/>

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
