<div {{ $attributes->merge(['class' => 'relative z-0']) }}>
    <input type="{{$type}}" id="floating_standard"
           class="block py-2 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 @error($name) focus:border-red-600 @enderror focus:border-blue-600 peer"
           {{ $attributes(['value' => old($name)]) }}
           name="{{$name}}"
           placeholder=" "/>
    <label for="floating_standard"
           class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 @error($name) peer-focus:scale-75 peer-focus:text-red-600 @enderror peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{$label}}</label>
    @error($name)
        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
    @enderror
</div>
