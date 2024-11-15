
<script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.umd.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARTTAJUTTU</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" bg-gray-800 text-white">
<div class="flex flex-col md:flex-row justify-between items-start ">
    <!-- Map on the left side -->
    <div class="w-full md:w-1/2 bg-gray-300">
        <x-maps-leaflet 
            class="w-full h-full" 
            :centerPoint="['lat' => $currentUserInfo->latitude, 'long' => $currentUserInfo->longitude]" 
            :markers="[['lat' => $currentUserInfo->latitude, 'long' => $currentUserInfo->longitude]]">
        </x-maps-leaflet>
    </div>

    <!-- Input field on the right side -->
    <div class="flex-col w-full md:w-1/3 mt-2 mr-32 md:mt-0 p-6">
    <!-- Title Input -->
    <div class="mb-6">
        <label for="large-input" class="block mb-2 font-medium text-white text-center text-xl dark:text-white">Header</label>
        <input type="text" id="large-input" class="w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    
    <!-- Description Textarea -->
    <div class="mb-6">
        <label for="large-input" class="block mb-2 font-medium text-white text-center text-xl dark:text-white">Description</label>
        <textarea rows="6" id="large-input" class="font-figtree w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
    </div>

    <!-- Centering the Button -->
    <div class="flex justify-center">
    <button class="mt-4 font-semibold w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
     Add an image from your device
    </button>
    
           
    </div>
    <div class="flex justify-center">
    <button class="mt-10 font-semibold w-full h-16 text-2xl px-6 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">
     Publish
    </button>
</div>
    
</div>
</body>
</html>
