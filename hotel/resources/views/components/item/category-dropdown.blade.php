{{-- 
@props(['categories'])

<div class="flex py-4 px-4">
    <div
        x-data="{ open: false, selectedCategory: '' }"
        x-on:keydown.escape.prevent.stop="open = false"
        x-on:focusin.window="open = false"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-on:click="open = !open"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow"
        >
            <span class="text-gray-900 font-medium">Filter by Categories</span>
            <!-- Heroicon: chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-on:click.outside="open = false"
            :id="$id('dropdown-button')"
            class="absolute left-0 mt-2 w-56 h-60 overflow-y-scroll rounded-md bg-white shadow-md"
        >
            @foreach ($categories as $category)
                <a x-on:click="open = false; window.location.href = '{{ route('admin.item.index', ['category' => $category->name]) }}';"
                   class="cursor-pointer flex items-center gap-2 w-full px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
 --}}
 @props(['categories'])

<div class="flex py-4 px-4">
    <div
        x-data="{ open: false, selectedCategory: '' }"
        x-on:keydown.escape.prevent.stop="open = false"
        x-on:focusin.window="open = false"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-on:click="open = !open"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow"
        >
            <span x-text="selectedCategory ? selectedCategory : 'Filter by Categories'" class="text-gray-900 font-medium"></span>
            <!-- Heroicon: chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-on:click.outside="open = false"
            :id="$id('dropdown-button')"
            class="absolute left-0 mt-2 w-56 h-60 overflow-y-scroll rounded-md bg-white shadow-md"
        >
            @foreach ($categories as $category)
                <a x-on:click.prevent="open = false; selectedCategory = '{{ $category->name }}';"
                   href="{{ route('admin.item.index', ['category' => $category->name]) }}"
                   class="cursor-pointer flex items-center gap-2 w-full px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>


