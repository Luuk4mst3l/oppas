{{-- @props(['tagsCsv'])

@php
    $tags = explode(',', '$tagsCsv')
@endphp

<ul class="flex flex-wrap gap-2 mt-4">
    @foreach($tags as $tag)
        <li class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
            <a href="/?tag={{ $tag }}">{{ $tag }} </a>
        </li>
    @endforeach
</ul> --}}