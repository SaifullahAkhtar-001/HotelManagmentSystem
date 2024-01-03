<div class="flex items-start gap-1">
    <input class="w-4 h-4" name="hero_section_image_url" id="radio_1" type="radio"
           value="{{$img->url}}" {{ $settings->hero_section_image_url == $img->url ? 'checked' : '' }}>
    <label class="flex flex-col p-1 border-2 border-gray-400 cursor-pointer"
           for="radio_{{$img->id}}">
        <img src="{{asset($img->url)}}" class="h-36 max-w-[12rem] object-fill" alt="no img">
    </label>
</div>
