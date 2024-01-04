<a href="{{route($name)}}"
   {{ $attributes->merge(['class' => "font-semibold flex items-end gap-2 px-4 py-2 mt-2 text-sm text-gray-900 rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"])}}>
    {{$slot}}
    <span class="">{{$label}}</span>
</a>
{{ $attributes->merge(['class' => 'relative z-0']) }}
