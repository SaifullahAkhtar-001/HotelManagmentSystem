<div class="container mx-auto p-4 lg:h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($amenities as $amenity)
            <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer group">
                <img src="{{asset($amenity->imggallery->url)}}" alt="" class="w-96 h-96 object-cover rounded-lg">
                <div class="absolute bottom-0 left-0 right-0 h-40 bg-black bg-opacity-50 lg:bg-opacity-0  backdrop-blur text-white p-4 rounded-b-lg lg:transition-all lg:duration-300 lg:transform lg:translate-y-0 lg:opacity-0 lg:group-hover:bg-opacity-50 lg:group-hover:translate-y-0 lg:group-hover:opacity-100">
                    <h1 class="text-2xl font-semibold">{{$amenity->name}}</h1>
                    <p class="mt-2 line-clamp-3">{{$amenity->description}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
