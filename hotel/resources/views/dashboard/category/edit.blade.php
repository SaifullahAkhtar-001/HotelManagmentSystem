<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Edit Category
        </h1>

        
        <form method="POST" action="{{route('admin.categories.update', $category->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-hotel-input name="name" :value="$category->name" title="Name" type="text"/>
            <x-form.submit-button value="Updat Category" />
        </form>
     
    </div>
</x-app-layout>
