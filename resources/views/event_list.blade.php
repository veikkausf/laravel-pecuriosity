<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white">

    <h1 class="text-6xl font-bold mt-10 text-center">Events</h1>
    <div class="text-center mt-10">
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-full">Create New Event</a>
    </div>
    <div class="flex flex-col items-center mt-10 overflow-y-auto">
        @foreach ($events as $event)
            <div class="bg-gray-700 p-6 m-4 rounded-lg w-96"> <!-- Increased width for larger boxes -->
                <h2 class="text-3xl font-semibold">{{ $event->title }}</h2>
                <p class="mt-2">{{ $event->description }}</p>
            </div>
        @endforeach
    </div>

    <!-- Button to create a new event -->
    

</body>
</html>
