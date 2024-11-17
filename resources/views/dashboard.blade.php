<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Dashboard') }}
      </h2>
   </x-slot>

   <div class="py-12">
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
         <div class="flex justify-center mt-20">
            <div x-data="{ open: false }">
                <button x-on:click="open = ! open">Tähän omat luodut eventit</button>
             
                <div x-show="open">
                    Lista/taulukko tähän
                </div>
            </div>
      </div>
   </div>
</x-app-layout>
