<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARTTAJUTTU</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" bg-gray-800 text-white">
<div class="w-full md:w-1/2 bg-gray-300">
<x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]" :markers="[
    ['lat' => 52.16444513293423, 'long' => 5.985622388024091],
    ['lat' => 52.170, 'long' => 5.990]  
]"></x-maps-leaflet>
<div>
<?php
echo "markers";

