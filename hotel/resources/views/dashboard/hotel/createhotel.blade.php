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


    <form method="POST" action="" class="max-w-4xl">
        @csrf
        <x-hotel-input name="hotel-name" title="Hotel Name" type="text"/>
        <x-hotel-textarea name="short-description" title="Short Description"/>
        <x-hotel-textarea name="description" title="Description"/>
        <x-hotel-input name="email" title="Email" type="email"/>
        <x-hotel-input name="phone" title="Phone" type="number"/>
        <x-hotel-input name="address" title="Address" type="text"/>
        <x-hotel-input name="zipcode" title="Zip Code" type="number"/>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Hotel</button>
    </form>

</div>
</body>
</html>
