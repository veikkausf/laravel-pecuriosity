<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */

        $ip = '141.208.40.36'; /* Static IP address */

        $currentUserInfo = Location::get($ip);
        // Nykyisen käyttäjän username
        $username = Auth::user()->name;

        return view('create_event', compact('currentUserInfo', 'username'));
    }
}
