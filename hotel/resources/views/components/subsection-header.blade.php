@props(['heading','description'])

<div class=" flex flex-col justify-center text-center h-[29vh] gap-4 max-w-4xl mx-auto">
    <h1 class="text-4xl font-semi-bold">{{$heading}}</h1>
    <p class="text-lg font-light ">
        {{$description}}
    </p>
    <hr class="w-24 mx-auto mt-4 border-b-2 border-stone-400"/>

</div>
