<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Tarkastetaan onko dataa
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'username' => 'nullable|max:100',
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

        // Niin on myös käyttäjänimen lisääminen listaukseen mukaan
        if ($request->has('username')) {
            $username = $request->input('username');
        }  else {
            $username = null;
        }

        // Tiedot tietokantaan
        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'username' => $username,
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image' => $imagePath,
        ]);
        return redirect()->route('event_list')->with('success', 'Your pecuriosity has been added!');
    }
    public function viewer(Request $request)
    {
        $events = Event::all();
        return view('event_list', compact('events'));
    }
    public function manager(Request $request)
    {
        $events = Event::where('username', Auth::user()->name)->get();
        return view('dashboard', compact('events'));
    }
public function destroy(Event $event)
{
    $event->delete();
    return redirect()->route('dashboard')->with('success', 'Listing removed');  
    
}
}
