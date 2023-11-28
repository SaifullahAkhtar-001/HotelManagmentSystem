@props(['image', 'title', 'price', 'description'])

<article
    class="shadow-2xl p-2 rounded-xl mx-auto pb-5 max-w-xl max-h-md transform duration-500 hover:-translate-y-1 cursor-pointer group">
    <div class="max-h-[28rem] overflow-hidden">
        <img draggable="false" class="rounded-xl transform duration-300 group-hover:scale-110" src="{{ $image }}"
            alt="">
    </div>
    <div class="mx-4">
        <div class="flex justify-between my-5 ">
            <div class="text-blue-500 text-2xl font-bold">{{ $title }}</div>
            <div class="text-base text-right"><span class="font-bold">{{ $price }}</span>/Day</div>
        </div>
        <h2 class="font-light ">{{ $description }}
        </h2>
        <div class="flex justify-between items-center mt-3 ">
            <a type="button"
                class="mt-4 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Book Now
            </a>
        </div>
    </div>
</article>
