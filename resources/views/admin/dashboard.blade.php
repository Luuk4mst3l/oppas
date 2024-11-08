{{-- <x-layout>
    <h1 class="text-2xl font-bold text-center my-4">All Listings</h1>

    @unless (count($listings) == 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($listings as $listing)
        <div class="bg-white rounded-lg shadow p-4">
            <a href="/listings/{{$listing['id']}}" class="block">
                <img src="{{$listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png')}}" alt=""
                     class="w-full h-48 object-cover rounded-lg mb-4" />
            </a>
            <h2 class="text-lg font-semibold mb-2">
                <a href="/listings/{{$listing['id']}}" class="hover:text-blue-500">
                    {{$listing['title']}}
                </a>
            </h2>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <form method="POST" action="/listings/{{$listing->id}}" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-600 mt-4">You currently have no item listings :(</p>
    @endunless

    <h1 class="text-2xl font-bold text-center my-4">All Users</h1>

    @unless (count($users) == 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($users as $user)
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">{{$user['name']}}</h2>
            <form method="POST" action="/admin/{{$user->id}}" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-600 mt-4">You are the only user</p>
    @endunless
</x-layout> --}}
<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-4">Admin Dashboard</h1>

        <h2 class="text-xl mb-4">Manage Listings</h2>
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <ul>
                @foreach($listings as $listing)
                    <li class="flex justify-between items-center mb-4">
                        <span>{{ $listing->title }}</span>
                        <form method="POST" action="/listings/{{ $listing->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

        <h2 class="text-xl mb-4">Manage Users</h2>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <ul>
                @foreach($users as $user)
                    <li class="flex justify-between items-center mb-4">
                        <span>{{ $user->name }} ({{ $user->email }})</span>
                        <form method="POST" action="/admin/{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>