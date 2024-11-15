
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]" 
                :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091]]"
                style="width: 750px; height: 750px; ">
</x-maps-leaflet>



<form method="POST" action="/profile">
    @csrf
    @method('PUT')
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
    <button type="submit">Submit</button>
</form>




