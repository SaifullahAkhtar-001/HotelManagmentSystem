<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Terms & Condition" subTitle="Here You Will Edit The Terms & Condition !"/>
        <form method="POST" action="{{route('hotels.terms.update', $term->id)}}" class="max-w-6xl flex flex-col gap-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input name="term" type="name" label="Terms&Condition" :value="$term->term"/>
            <x-form.submit-button value="Save"/>
        </form>
    </div>
</x-app-layout>
