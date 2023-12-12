<x-hotelSettingsSection>


    <!-- resources/views/dashboard/hotel-settings/general.blade.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- resources/views/dashboard/hotel-settings/general.blade.php -->


    <div class="container">
        <h2 class="mt-4">General Settings</h2>

        <form method="post" action="{{ route('hotel.settings.general.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="hotel_name">Hotel Name:</label>
                <input type="text" class="form-control" name="hotel_name"
                    value="{{ $hotel->settings->hotel_name ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="hotel_address">Hotel Address:</label>
                <input type="text" class="form-control" name="hotel_address"
                    value="{{ $hotel->settings->hotel_address ?? '' }}" required>
            </div>

            <div class="form-group">
                <h3>Contact Information</h3>
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $hotel->settings->phone ?? '' }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $hotel->settings->email ?? '' }}"
                    required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    


</x-hotelSettingsSection>
