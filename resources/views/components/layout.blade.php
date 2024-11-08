<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passen Op Je Dier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/"><h1 class="text-xl font-bold text-gray-800">Passen Op Je Dier</h1></a>
            <nav class="flex spread-between items-center mb-4">
                <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a>
                <ul class="flex space-x-6 mr-6 text-lg">
                  @auth
                  <li class="relative">
                    <span class="font-bold uppercase">
                      Welkom {{auth()->user()->name}}
                    </span>
                  </li>
                  <li>
                    <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Listings</a>
                  </li>
                  <li>
                    <form class="inline" method="POST" action="/logout">
                      @csrf
                      <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                      </button>
                    </form>
                  </li>
                  @else
                  <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                  </li>
                  <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                  </li>
                  @endauth
                </ul>
              </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4 text-center text-gray-600">
            <p>Created for IATBD, 2024</p>
        </div>
    </footer>
    <x-flash-message />
</body>
</html>