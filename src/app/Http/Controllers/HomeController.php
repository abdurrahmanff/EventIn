<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Event;
use \App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        return view('home', [   
            "title" => "Home", 
            "events" => Event::with('category')->limit(5)->get(),
            "categories" => Category::All(),
        ]);
    
    }
}
