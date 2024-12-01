<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>KARTTAJUTTU</title>

   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet">

   <!-- Alpine.js CDN paketti -->
   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

   <!-- Leaflet CSS, pitää lisätä jos haluaa tyylitellä "https://github.com/LarsWiegers/laravel-maps" -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin="" />
</head>

<body class=" bg-gray-800 text-white">
   <!-- Controllerille käyttäjän lisäämät tiedodt -->
   <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-col md:flex-row justify-between items-start ">
         <!-- Map on the left side -->
         <div class="w-full md:w-1/2 bg-gray-300">
            <x-maps-leaflet class="w-full h-full" :centerPoint="[
                'lat' => $currentUserInfo->latitude,
                'long' => $currentUserInfo->longitude,
            ]" :markers="[
                [
                    'lat' => $currentUserInfo->latitude,
                    'long' => $currentUserInfo->longitude,
                ],
            ]">
            </x-maps-leaflet>
         </div>

         <!-- Input field on the right side -->
         <div class="flex-col w-full md:w-1/3 mt-2 mr-32 md:mt-0 p-6">
            <!-- Title Input -->
            <div class="mb-6">
               <label for="title"
                  class="block mb-2 font-medium text-white text-center text-xl dark:text-white">Header</label>
               <input type="text" id="title" name="title"
                  placeholder="Maximum 100 characters"
                  class="w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <!-- Description Textarea -->
            <div class="mb-6">
               <label for="description"
                  class="block mb-2 font-medium text-white text-center text-xl dark:text-white">Description</label>
               <textarea placeholder="Maximum 550 characters" rows="6" id="description" name="description"
                  class="font-figtree w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
               <div>

                  <!-- Centering the Button -->
                  <div class="flex justify-center">
                     <label for="image"
                        class="mt-4 font-semibold w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 cursor-pointer flex items-center justify-center">
                        Add an image from your device
                     </label>
                     <input type="file" id="image" name="image" class="hidden"
                        accept="image/*">
                  </div>
                  <input type="hidden" id="latitude" name="latitude"
                     value="{{ $currentUserInfo->latitude }}">
                  <input type="hidden" id="longitude" name="longitude"
                     value="{{ $currentUserInfo->longitude }}">
                  <div class="flex justify-center">
                     <button
                        class="mt-10 font-semibold w-full h-16 text-2xl px-6 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">
                        Publish
                     </button>
                  </div>
   </form>

   </div>
   {{-- Kirjoittamisen peruutus, palauttaa event lista sivulle --}}
   <a href="{{ route('event_list') }}"
      class="mt-10 font-semibold w-full h-16 text-2xl px-6 transition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-500 hover:text-red-100 flex items-center justify-center">
      Cancel
   </a>
</body>

</html>

<script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.umd.js"></script>
