<x-app-layout>
    <x-form.header title="Edit Booking"  subTitle="Edit the Booking"/>
    <form method="POST" action="{{route('admin.booking.update', $booking->id)}}" class="flex flex-col gap-4">
        @csrf
        @method('PUT')
        <div class="flex gap-4">
            <label for="room_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Room
                <select id="room_id" name="room_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }} >{{ $room->room_number }}</option>
                    @endforeach
                </select>
            </label>
            <label for="guest_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Guest
                <select id="guest_id" name="guest_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($guests as $guest)
                        <option value="{{ $guest->id }}" {{ $booking->guest_id == $guest->id ? 'selected' : '' }}>{{ $guest->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-500 ">Booking Status
                <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </label>
            <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-500 ">Payment Status
                <select id="payment_status" name="payment_status"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="cancelled" {{ $booking->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </label>
            <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-500 ">Payment Method
                <select id="payment_method" name="payment_method"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    <option value="cash" {{ $booking->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="card" {{ $booking->payment_method == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="paypal" {{ $booking->payment_method == 'paypal' ? 'selected' : '' }}>Paypal</option>
                </select>
            </label>
        </div>
        <div class="flex gap-4">
            <x-form.input type="number" label="nights" name="nights" class="w-36" :value="$booking->nights ?? null"/>
            <x-form.input type="text" name="payment_payload" label="payment_payload" class="w-56" :value="$booking->payment_payload ?? null"/>
            <x-form.input type="text" name="payment_amount" label="payment_amount" class="w-56" :value="$booking->payment_amount ?? null"/>
            <x-form.input type="text" name="payment_currency" label="payment_currency" class="w-56" :value="$booking->payment_currency ?? null"/>
        </div>
        <div class="flex gap-4 mb-3">
            <x-form.input type="number" min="0" max="4" name="adults" label="adults" class="w-16" :value="$booking->adults ?? null"/>
            <x-form.input type="number" min="0" max="4" name="children" label="children" class="w-16" :value="$booking->children ?? null"/>
        </div>
        <div class="flex gap-3">
            <x-form.input type="datetime-local" name="check_in" label="Check In" class="w-56" :value="$booking->check_in ?? ''"/>
            <x-form.input type="datetime-local" name="check_out" label="Check Out" class="w-56" :value="$booking->check_out ?? ''"/>
        </div>

        <x-form.submit-button value="Update"/>
    </form>
</x-app-layout>
