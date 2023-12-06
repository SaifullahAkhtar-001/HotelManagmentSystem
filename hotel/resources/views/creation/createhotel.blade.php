<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="max-w-7xl  mx-auto">
    <h1 class="text-4xl my-12 font-bold">
        Create Hotel
    </h1>


    <form class="max-w-4xl">
        <x-hotel-input for="hotel-name" title="Hotel Name" type="text"/>
        <x-hotel-textarea for="short-description" title="Short Description"/>
        <x-hotel-textarea for="description" title="Description"/>
        <x-hotel-input for="email" title="Email" type="email"/>
        <x-hotel-input for="phone" title="Phone" type="number"/>
        <x-hotel-input for="address" title="Address" type="text"/>
        <x-hotel-input for="zipcode" title="Zip Code" type="number"/>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Hotel</button>
    </form>

</div>
</body>
</html>
