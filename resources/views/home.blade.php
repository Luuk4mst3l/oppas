@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Welkom bij Passen Op Je Dier</h2>
    <p class="text-gray-600">Vind een gepaste dierenoppas voor je huisdieren.</p>
    <div class="mt-6 space-y-4">
        <a href="#" class="block w-full bg-blue-500 text-white text-center py-2 px-4 rounded hover:bg-blue-600">Vind een dierenoppas</a>
        <a href="/listings" class="block w-full bg-green-500 text-white text-center py-2 px-4 rounded hover:bg-green-600">Bied je oppasdiensten aan</a>
    </div>
</div>
@endsection