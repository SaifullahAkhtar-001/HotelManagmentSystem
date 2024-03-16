<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Create Category" subTitle="Here You Will Add Your Available Category!" />
        <form method="POST" action="{{route('admin.categories.store')}}" class="max-w-4xl">
            @csrf
            
            <x-form.input class="mb-8" name="name" type="name" label="Name" />
            
            <x-form.input class="mb-8" name="description" type="description" label="description" />
            <x-form.submit-button value="Create Category" />
        </form>
    
    </div>
    </x-app-layout>
    