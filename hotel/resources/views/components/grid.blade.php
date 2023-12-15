<div class="grid lg:grid-rows-2 lg:grid-cols-4 mt-5  lg:grid-flow-col">
    <div class="h-[317px] overflow-hidden relative">
        <img draggable="false"  src="{{asset($hotel->imggallery[0]->url) }}" alt=""/>
    </div>

    <div class="m-4 flex items-center text-center">
        <div>
            <h1 class="text-xl">{{$hotel->amenities['amenity1']}}</h1>
            <p class="text-lg font-light">
            {{$hotel->amenities['amenity1_description']}}
            <hr class="w-12 mx-auto mt-4 border-b-2 border-stone-400"/>

            </p>
        </div>
    </div>

    <div class="lg:hidden h-[317px] overflow-hidden relative">
        <img draggable="false" src="{{asset('images/img (1).jpg') }}" alt=""/>
    </div>

    <div class="m-4 flex items-center text-center">
        <div>
            <h1 class="text-xl">{{$hotel->amenities['amenity2']}}</h1>
            <p class="text-lg font-light">
                {{$hotel->amenities['amenity2_description']}}
            </p>
            <hr class="w-12 mx-auto mt-4 border-b-2 border-stone-400"/>
        </div>
    </div>


    <div class="max-lg:hidden h-[317px] overflow-hidden relative">
        <img draggable="false" src="{{asset('images/img (2).jpg') }}" alt=""/>
    </div>


    <div class="h-[317px] overflow-hidden relative">
        <img draggable="false" src="{{asset('images/img (2).jpg') }}" alt=""/>
    </div>


    <div class="m-4 flex items-center text-center">
        <div>
            <h1 class="text-xl">{{$hotel->amenities['amenity3']}}</h1>
            <p class="text-lg font-light">
                {{$hotel->amenities['amenity3_description']}}
            </p>
            <hr class="w-12 mx-auto mt-4 border-b-2 border-stone-400"/>
        </div>
    </div>

    <div class="lg:hidden h-[317px] overflow-hidden relative">
        <img draggable="false" src="{{asset('images/img (3).jpg') }}" alt=""/>
    </div>

    <div class="m-4 flex items-center text-center">
        <div>
            <h1 class="text-xl">{{$hotel->amenities['amenity4']}}</h1>
            <p class="text-lg font-light">
                {{$hotel->amenities['amenity4_description']}}
            </p>
            <hr class="w-12 mx-auto mt-4 border-b-2 border-stone-400"/>
        </div>
    </div>


    <div class="max-lg:hidden h-[317px] overflow-hidden relative">
        <img draggable="false" src="{{asset('images/img (4).jpg') }}" alt=""/>
    </div>


</div>
