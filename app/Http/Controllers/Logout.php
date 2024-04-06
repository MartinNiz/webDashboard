<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logout extends Controller
{
    //
    public function index() 
    {
        auth()->logout();
        return redirect()->route('home', app()->getLocale());    
    }
}
