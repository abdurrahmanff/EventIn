<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Event;
use \App\Models\EventCategory;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->where('status', 1)->get()->take(5);
        // dd($events[0]->tickets->first()->price);
        return view('home', [   
            "title" => "Home", 
            "events" => $events,
            "categories" => EventCategory::All(),
        ]);
    
    }
}
