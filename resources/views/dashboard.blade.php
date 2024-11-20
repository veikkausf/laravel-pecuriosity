<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Dashboard') }}
      </h2>
   </x-slot>

   <div class="py-12 bg-gray-800">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
               {{ __("You're logged in!") }}
            </div>
         </div>
         <div class="flex justify-center mt-20">
            <a class="underline text-7xl text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('event_list') }}">View Events</a>
         </div>

         <!-- Dropdown nappi -->
         <div class="flex justify-center mt-20">
            <div x-data="{ open: false }" class="w-5/6 text-center">

               <button x-on:click="open = ! open"
                  class="mb-6 bg-indigo-500 text-white font-semibold px-12 py-6 text-3xl rounded-lg hover:bg-indigo-600">
                  Your history
               </button>

               <!-- Lista vanhoja eventtejä -->
               <div x-show="open" class="flex flex-col items-center">
                  @foreach ($events->sortByDesc('created_at') as $event)
                     <div
                        class="border border-gray-400 bg-gray-800 flex items-center justify-between p-4 w-5/6">
                        <div class="flex-1 pr-4">
                           <h3 class="text-2xl font-semibold text-white">{{ $event->title }}</h3>
                           <p class="mt-2 text-xl font-semibold text-gray-300 break-all">
                              {{ $event->description }}</p>
                           <p class="mt-2 font-semibold text-xl text-gray-400">
                              {{ $event->created_at->format('l, H:i') }}
                           </p>
                        </div>

                        <!-- POISTO TÄHÄN (EventController destroy tms.) -->
                        <button
                           class="bg-red-700 text-white font-semibold px-10 py-4 text-xl rounded hover:bg-red-900 ">
                           Delete
                        </button>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>

</x-app-layout>
