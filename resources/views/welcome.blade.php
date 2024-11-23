<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen flex  flex-col text-center items-center justify-center bg-gray-800 text-white">
 
  <div class="flex flex-col items-center space-y-8 mb-10">
    <h1 class="text-6xl font-bold mt-8">WELCOME TO PECURIOSITIES!</h1>
    <a href="{{ route('event_list') }}" class="border-2 text-4xl font-semibold border-white px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700">
      LATEST PECURIOSITIES HERE
    </a>
  </div>
  
  <div class="flex flex-row items-center gap-4">
    <!-- Auth linkit -->
    @auth
      <a href="{{ url('/dashboard') }}"
         class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
        Dashboard
      </a>
    @else
      <a href="{{ route('login') }}"
         class="px-6 py-3 text-2xl bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
        Log In
      </a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}"
           class="px-6 py-3 text-2xl bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
          Register
        </a>
      @endif
    @endauth
  </div>
</body>
</html>
