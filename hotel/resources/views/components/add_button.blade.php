<a data-tooltip-target="tooltip-default" href="{{ $link }}" class="w-fit h-auto">
    <div class="flex-1 h-full group">
        <div class="flex items-center justify-center flex-1 h-full p-2 border border-gray-400 group-hover:border-blue-400 rounded-full">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:stroke-blue-400 stroke-gray-500 group" fill="none" viewBox="0 0 24 24" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
        </div>
    </div>
</a>
<div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 bg-opacity-30 rounded-lg shadow-sm opacity-0 tooltip">
    {{$tooltip}}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
