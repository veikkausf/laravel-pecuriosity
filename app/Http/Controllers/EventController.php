<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Tarkastetaan onko dataa
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
    
        // Kuvan lataaminen on vapaa-ehtoista
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Kuvat julkisena, että voi näyttää sivulla
        } else {
            $imagePath = null; // Jos ei kuvaa
        }
    
        // Tiedot tietokantaan
        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image' => $imagePath, 
        ]);
        
        
    $events = Event::all();
        
    
        
    }
    public function viewer(Request $request)
    {
        $events = Event::all();
        return view('event_list', compact('events'));
    }
}    
