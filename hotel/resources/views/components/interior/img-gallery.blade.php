@props(['website_settings', 'interior'])

<div class="max-w-7xl mx-auto pb-24 grid grid-cols-2 max-md:mx-2 md:grid-cols-3 gap-4">
    @foreach($interior->imggallery as $image)
    <img class="h-96 w-full object-cover rounded-lg" src="{{asset($image->url)}}" alt="">
    @endforeach
</div>
