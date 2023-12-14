<x-app-layout>
    <div>
        <div class="max-md:hidden">
            <x-subNav/>
        </div>
        <div class="p-6 ">
            {{$slot}}
        </div>
    </div>
</x-app-layout>
