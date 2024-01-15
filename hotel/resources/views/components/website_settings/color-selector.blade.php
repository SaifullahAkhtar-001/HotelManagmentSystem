{{--<div class="flex flex-col gap-3 border-b-2 py-1 mb-4">--}}
{{--    <div class="font-bold">Select {{$name}} Color</div>--}}
{{--    <label>--}}
{{--        <input type="color" value="{{ $settings->{$name.'_color'} }}" name="{{ $name }}_color">--}}

{{--    </label>--}}

{{--</div>--}}

<div class="h-fit w-fit p-3 rounded-xl border-2 relative">
    <p class="text-sm absolute top-[-8px] px-2 bg-gray-100 ">{{$name}}</p>
    <label>
        <input type="color" class="h-10 cursor-progress" value="{{ $settings->{$name.'_color'} }}" name="{{ $name }}_color">

    </label>
</div>
