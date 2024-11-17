<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Event List</title>
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <!-- Alpine.js CDN paketti -->
   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

   <!-- Leaflet CSS, pitää lisätä jos haluaa tyylitellä "https://github.com/LarsWiegers/laravel-maps" -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin="" />
</head>

<body class="bg-gray-800 text-white">

   <h1 class="text-6xl font-bold mt-10 text-center">Latest Pecuriosities</h1>
   <div class="flex justify-center mt-10">
      <a href="create_event"
         class="bg-indigo-500 transition-colors duration-150 text-white text-center text-2xl py-2 px-4 rounded-lg hover:bg-indigo-900"><b>List your own
            pecuriosity</b> <br>(Login required)</a>
   </div>

   <div>
      @if (session('success'))
         <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2500)"
            x-transition:leave="transition-opacity duration-1000 ease-out" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="text-center bg-grey-900 text-white rounded">
            {{ session('success') }}
         </div>
      @endif
   </div>

   {{-- Listataan eventit controllerin myötä --}}
   <div class="flex flex-col items-center mt-10 overflow-y-auto">
      @foreach ($events as $event)
         <div class="bg-gray-700 p-6 m-4 rounded-lg border-2 border-blue-300 w-2/3 text-center">
            <h2 class="text-5xl font-bold">{{ $event->title }}</h2>
            <div x-data="{ open: false }">
               <button class="text-lg font-semibold pt-4" x-on:click="open = ! open">Press for more info <br> ↓</button>
               <div x-show="open">
               <p class="mt-2 font-semibold">{{ $event->description }}</p>
               </div>
            </div>
            {{-- <img src="{{ $event->image }} width="500" height="600"> --}}

            {{-- Kartta jokaisen tapahtuman alla, otetaann recordin id:n kanssa koordinaatit  --}}
            <div x-show="open" class="flex flex-wrap space-x-4 mt-4">
               {{-- Jos halutaan renderaa enemmän kuin yksi kartta, pitää myös antaa id jokaiselle --}}
               <div id="map-{{ $event->id }}" class="w-full h-64">
                  <x-maps-leaflet :id="'map-' . $event->id" :centerPoint="['lat' => $event->latitude, 'long' => $event->longitude]" :markers="[['lat' => $event->latitude, 'long' => $event->longitude]]">
                  </x-maps-leaflet>
               </div>
            </div>
         </div>
      @endforeach
      <button class="bg-blue-700 text-2xl font-semibold text-white text-center py-6 px-8 rounded-lg mb-2 hover:bg-blue-900" onclick="scrollUp()"
         title="back to top">Back to the top</button>
   </div>

   <!-- Leaflet JS -->
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>

   <script>
      document.addEventListener("DOMContentLoaded", function() {
         @foreach ($events as $event)
            var map{{ $event->id }} = L.map('map-{{ $event->id }}').setView([{{ $event->latitude }},
               {{ $event->longitude }}
            ], 10);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map{{ $event->id }});
            L.marker([{{ $event->latitude }}, {{ $event->longitude }}]).addTo(map{{ $event->id }});
         @endforeach
      });

      // Scrollaa ylös
      function scrollUp() {
         document.documentElement.scrollTop = 0;
      }
   </script>

</body>

</html>
