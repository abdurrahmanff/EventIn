<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event(Event $event){
        return view('event_detail', [
            "title" => "Detail Event",
            "event" => $event,
            "tickets" => Ticket::where('event_id', $event->id)->get(),
            "user" => User::where('id', $event->user_id)->first()->name
        ]);
    }
}
