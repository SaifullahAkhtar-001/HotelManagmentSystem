<div class="container mx-auto p-4 lg:h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($amenities as $amenity)
        <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer">
            <img src="{{asset($amenity->imggallery->url)}}" alt="" class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-0 left-0 right-0 h-40 bg-black bg-opacity-50 backdrop-blur text-white p-4 rounded-b-lg">
                <h1 class="text-2xl font-semibold">{{$amenity->name}}</h1>
                <p class="mt-2">{{$amenity->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
