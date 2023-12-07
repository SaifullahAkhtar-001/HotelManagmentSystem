<div id="home" class="relative bg-opacity-50 bg-cover h-[100vh] bg-stone-300 text-white"
    style="background-image: url('{{ asset('images/hotel.jpg') }}');">

    <div class="h-full  backdrop-blur-sm">
        <x-nav />
        <div class="h-[90vh] max-w-6xl pt-[25vh] mx-auto flex flex-col items-center gap-6 text-center">
            <p class="text-xl font-light">Welcome To</p>
            <hr class="w-12">
            <h1 class="text-6xl mb-4">{{$hotel->hotel_name}}</h1>
            <p class="text-lg font-light">Tofu helvetica leggings tattooed. Skateboard blue bottle green juice, brooklyn
                cardigan kitsch <br>fap
                narwhal
                organic flexitarian.
            </p>
            <hr class="w-24">
            <div class="sm:hidden">
                <x-responsive-search />

            </div>
        </div>
        <div class="max-sm:hidden">
            @include('components.search-room')
        </div>
    </div>
</div>
