<x-layout>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Aanpassen: {{ $listing->title }}</h1>
        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6 space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">titel</label>
                <input type="text" name="title" id="title" required value="{{ $listing->title }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Datum</label>
                    <input type="date" name="start_date" id="start_date" required value="{{ $listing->start_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Eind Datum</label>
                    <input type="date" name="end_date" id="end_date" required value="{{ $listing->end_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Locatie</label>
                <input type="text" name="location" id="location" required value="{{ $listing->location }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                  Dieren tags (Gesplitst op comma's bij meerdere.)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags[]"
                  placeholder="Example: Hond, Kat, Vis, etc" value="{{ implode(',', $listing->tags) }}"/>
        
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            {{-- <div class="mb-6">
                <label for="photo" class="inline-block text-lg mb-2">
                  Foto toevoegen
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />
        
                @error('photo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4" required placeholder="Geef extra info over het huisdier, zoals soort, benodigde aandacht, eisen voor de oppas, etc. "
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ $listing->description }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="hourly_rate" class="block text-sm font-medium text-gray-700 mb-1">Aangeboden uurloon (€)</label>
                <input type="number" name="hourly_rate" id="hourly_rate" step="0.01" min="0" required value="{{ $listing->hourly_rate }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('hourly_rate')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit Listing
                </button>
            </div>
        </form>
    </div>
    <div class="mt-6">
        <a href="/" class="text-gray-600 hover:text-gray-800">
            ← Terug naar verzoeken
        </a>
    </div>
</x-layout>