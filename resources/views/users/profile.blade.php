<x-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Edit Profile</h2>
        @if(session()->has('message'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:ring-indigo-100">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:ring-indigo-100">{{ old('description', $user->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Profile Image</label>
                <input type="file" name="profile_image" class="w-full border border-gray-300 rounded p-2 focus:outline-none">
                @if ($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="mt-2 h-24 w-24 rounded-full">
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Profile
            </button>
        </form>
        @if ($user->profile_image)
    <div class="mt-4">
        <img src="{{ asset('public/' . $user->profile_image) }}" alt="Profile Image"
             class="w-24 h-24 rounded-full">
    </div>
@else
    <div class="mt-4">
        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?d=identicon" alt="Profile Image"
             class="w-24 h-24 rounded-full">
    </div>
@endif
    </div>
</x-layout>
