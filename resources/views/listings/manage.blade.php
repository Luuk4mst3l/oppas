<x-layout>
    <x-card class="p-10">
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Gigs
        </h1>
      </header>
  
      <table class="w-full table-auto rounded border border-gray-300 shadow-md">
        <tbody>
            @unless($listings->isEmpty())
                @foreach($listings as $listing)
                    <tr class="border-b last:border-none rounded hover:bg-gray-100 transition">
                        <td class="px-4 py-4 border-gray-300 text-lg">
                            <a href="/listings/{{$listing->id}}" class="text-gray-800 hover:text-blue-600 font-medium">
                                {{$listing->title}}
                            </a>
                        </td>
                        <td class="px-4 py-4 border-gray-300 text-lg flex justify-end space-x-4">
                            <a href="/listings/{{$listing->id}}/edit" class="text-blue-500 px-4 py-2 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form method="POST" action="/listings/{{$listing->id}}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 px-4 py-2 rounded-lg border border-red-500 hover:bg-red-500 hover:text-white transition">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="px-4 py-8 text-lg text-center" colspan="2">
                        <p class="text-gray-500">No Listings Found</p>
                    </td>
                </tr>
            @endunless
        </tbody>
    </table>
    
    </x-card>
  </x-layout>