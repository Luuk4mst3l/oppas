<x-layout>

@unless(count($listings) == 0)
@include('partials._search')

<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Huisdier oppasverzoeken</h2>
        <a href="/listings/create" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300">
            Maak een verzoek
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($listings as $listing)
            <x-listing-card :listing="$listing"/>
        @endforeach
        @else 
            <div class="col-span-full">
                <p class="text-center text-gray-500">No listings found</p>
            </div>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
</div>
</x-layout>



{{-- @foreach($listings as $listing)
    <h2>
        <a href="/listings/{{$listing['id'] }}">{{ $listing['title']}}</a>
    </h2>
    <p>
        {{$listing['description']}}
    </p>
@endforeach --}}

