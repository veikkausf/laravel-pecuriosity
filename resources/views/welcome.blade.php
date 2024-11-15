<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen flex items-center justify-center bg-gray-800 text-white">
  <div class="flex flex-col items-center space-y-4">
    <!-- Auth linkit -->
    @auth
      <a href="{{ url('/dashboard') }}"
         class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
        Dashboard
      </a>
    @else
      <a href="{{ route('login') }}"
         class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
        Log In
      </a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}"
           class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
          Register
        </a>
      @endif
    @endauth
  </div>
</body>
</html>
