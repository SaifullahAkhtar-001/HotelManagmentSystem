<x-hotelSettingsSection>
    <h2>General Settings</h2>

    <form method="post" action="">
        @csrf
        @method('put')

        <label for="hotelName">Hotel Name:</label>
        <input type="text" name="hotelName" value="{{ $generalSettings['hotelName'] }}" required>

        <label for="hotelAddress">Hotel Address:</label>
        <input type="text" name="hotelAddress" value="{{ $generalSettings['hotelAddress'] }}" required>

        <h3>Contact Information</h3>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $generalSettings['contactInformation']['phone'] }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $generalSettings['contactInformation']['email'] }}" required>

        <!-- Add more fields as needed -->

        <button type="submit">Save Changes</button>
    </form>
</x-hotelSettingsSection>
