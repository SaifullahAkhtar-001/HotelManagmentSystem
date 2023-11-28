@props([
    'name','img','review',
    ])
<blockquote class="rounded-lg bg-gray-50 p-6 shadow-2xl sm:p-8">
    <div class="flex items-center gap-4">
        <img
            alt="Man"
            src="{{$img}}"
            class="h-14 w-14 rounded-full object-cover"
        />

        <div>
            <p class="mt-0.5 text-lg font-medium text-gray-900">{{$name}}</p>
        </div>
    </div>

    <p class="mt-4 text-gray-700">
        {{$review}}
    </p>
</blockquote>
