@props(['listing'])

<div class="bg-white rounded-lg shadow-md p-6">
    {{-- <h2 class="text-xl font-semibold text-gray-800 mb-2">
        <a href="/listings/{{$listing['id'] }}">{{ $listing['title']}}</a>
    </h2> --}}
    
    <h2 class="text-xl font-semibold text-gray-800 mb-2">
        <a href="/listings/{{$listing['id'] }}" class="hover:text-blue-600">{{ $listing->title }}</a>
    </h2>
    <p class="text-gray-600 mb-4">
        {{ Str::limit($listing->description, 100) }}
    </p>
    <div class="border-t pt-4 mt-4">
        <div class="flex justify-between items-center mb-2">
            <div class="text-sm text-gray-600">
                <i class="far fa-calendar-alt mr-1"></i> Start:
            </div>
            <div class="text-sm font-medium text-gray-800">
                {{ $listing->start_date->format('M d, Y') }}
            </div>
        </div>
        <div class="flex justify-between items-center mb-2">
            <div class="text-sm text-gray-600">
                <i class="far fa-calendar-alt mr-1"></i> End:
            </div>
            <div class="text-sm font-medium text-gray-800">
                {{ $listing->end_date->format('M d, Y') }}
            </div>
        </div>
        <div class="flex justify-between items-center mb-2">
            <div class="text-sm text-gray-600">
                <i class="fas fa-map-marker-alt mr-1"></i> Location:
            </div>
            <div class="text-sm font-medium text-gray-800">
                {{ $listing->location }}
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-600">
                <i class="fas fa-euro-sign mr-1"></i> Hourly Rate:
            </div>
            <div class="text-sm font-medium text-green-600">
                €{{ number_format($listing->hourly_rate, 2) }}
            </div>
        </div>
    </div>
    <ul class="flex flex-wrap gap-2 mt-4">
        @foreach($listing->tags as $tag)
            <li class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                <a href="/?tag={{ $tag }}">{{ $tag }}</a>
            </li>
        @endforeach
    </ul>
</div>