<x-layout>
<div class="max-w-4xl mx-auto">
    <x-card>
        <!-- Listing Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $listing->title }}</h1>
            <div class="flex flex-wrap gap-2">
                @foreach($listing->tags as $tag)
                    <span class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        </div>
        <!-- Description -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Description</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $listing->description }}</p>
        </div>

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

        <!-- Contact Button -->
        <div class="mt-8 flex space-x-4">
            <a href="/listings/respond/{{$listing['id'] }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                Reageren op verzoek
            </a>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-40 space-between">
        <a href="/listings/{{ $listing->id }}/edit" class="flex space-x-10">
            <i class="fa-solid fa-pencil">Aanpassen</i>
        </a>

        <form method="POST" action="/listings/{{ $listing->id }}" class="flex right-0">
            @csrf
            @method('DELETE')
            <button class="text-red-500 font-bold">
                <i class="fa-solid fa-trash"></i> 
                Delete
            </button>
        </form>
    </x-card>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="/" class="text-gray-600 hover:text-gray-800">
            ← Terug naar verzoeken
        </a>
    </div>
</div>
</x-layout>
