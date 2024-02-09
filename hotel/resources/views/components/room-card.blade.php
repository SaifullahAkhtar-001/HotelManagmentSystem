@props(['room'])
<article
    class="shadow-2xl p-2 rounded-xl mx-auto pb-5 w-full max-w-xl max-h-md transform duration-500 hover:-translate-y-1 group">
    <div class="max-h-[28rem] overflow-hidden">
        @if($room->imggallery->count() > 0)
        <img draggable="false" class="rounded-xl md:h-[28rem] h-[20rem] w-full transform duration-300 group-hover:scale-110" src="{{asset($room->imggallery->where('is_hero', true)->first()->url ?? $room->imggallery->first()->url)}}" alt="">
        @else
            <p>No image found </p>
        @endif
    </div>
    <div class="mx-4">
        <div class="flex justify-between my-5 ">
            <div class="text-blue-500 text-2xl font-bold">{{ $room->name }} Room</div>
            <div class="text-base text-right">Starting form <span class="font-bold">${{ $room->price }}</span></div>
        </div>
        <h2 class="font-light line-clamp-3 md:h-28 h-auto overflow-hidden">{{ $room->description }}
        </h2>
        <div class="flex justify-between items-center mt-3 ">
            <a type="button" href="{{ route('room.show', $room->id) }}"
                class="mt-4 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                See Details
            </a>
        </div>
    </div>
</article>
