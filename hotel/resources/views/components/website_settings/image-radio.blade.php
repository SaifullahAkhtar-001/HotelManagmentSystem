<div class="flex items-start gap-1">
    <input class="w-4 h-4" name="{{$name}}" type="radio"
           value="{{$img->id}}" {{ $img->is_hero ? 'checked' : '' }}>
    <label class="flex flex-col p-1 border-2 rounded-lg border-gray-400 cursor-pointer"
           for="radio_{{$img->id}}">
        <img src="{{asset($img->url)}}" class="h-36 w-[12rem] object-fill" alt="no img">
    </label>
</div>
