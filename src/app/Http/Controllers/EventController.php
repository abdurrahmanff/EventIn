<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function postEvent(Request $request){
        $request->validate([
            'nama_event' => 'required',
            'kategori' => 'required',
            'from_date' => 'date|required',
            'to_date' => 'date|required',
            'from_time' => 'required',
            'to_time' => 'required',
            'deskripsi_event' => 'required|max:255',
        ]);

        // dd($user_id);

        Event::create([
            'category_id' => $request->kategori,
            'user_id' => Auth::user()->id,
            'name' => $request->nama_event,
            'schedule' => $request->from_date.' '.$request->from_time.":00",
            'end_schedule' => $request->to_date.' '.$request->to_time.":00",
            'desc' => $request->deskripsi_event,
            'place' => $request->lokasi_event,
            'status' => 0
        ]);

        return redirect('/buat-event/buat-tiket');
    }

    public function eventlist(){
        
        // dd($events->count());

        return view('events',[
            "title" => "Semua Event",
            "events" => Event::filter(request(['search', 'category']))->get()
        ]);
    }
}
