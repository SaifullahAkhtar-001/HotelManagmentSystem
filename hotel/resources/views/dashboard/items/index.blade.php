<x-app-layout>
    <div class="flex mx-4 justify-between items-center pb-8 text-4xl">
        <h1>Inventory</h1>
        <a href="{{route('item.create')}}"
           class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Add
            item</a>
    </div>
    <div class="mx-4 mb-4">
        <input type="text" id="search" autocomplete="none" class="border rounded p-2" placeholder="Search...">
    </div>
    <section class="mx-4 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-3">
        @foreach($items as $item)
            <x-item.item-card :item="$item" />
        @endforeach
    </section>
    <div class="mt-4">
        {{$items->links()}}
    </div>
</x-app-layout>
