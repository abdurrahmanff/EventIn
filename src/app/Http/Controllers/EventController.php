<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function event(Event $event){
        return view('event_detail', [
            "title" => "Detail Event",
            "event" => $event,
            "tickets" => TicketCategory::where('event_id', $event->id)->get(),
            "user" => User::where('id', $event->user_id)->first()->name
        ]);
    }

    public function postEvent(Request $request){
        // $request->validate([
        //     'name' => 'required|string|max:255|unique:events',
        //     'kategori' => 'required',
        //     'from_date' => 'date|required',
        //     'to_date' => 'date|required',
        //     'from_time' => 'required',
        //     'to_time' => 'required',
        //     'deskripsi_event' => 'required|max:255',
        // ]);

        // dd($user_id);

        Event::create([
            'category_id' => $request->kategori,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'schedule' => $request->from_date.' '.$request->from_time.":00",
            'end_schedule' => $request->to_date.' '.$request->to_time.":00",
            'desc' => $request->deskripsi_event,
            'place' => $request->lokasi_event,
            'status' => 0
        ]);

        $eventId = Event::where('name', $request->name)->first()->id;

        return redirect('/buat-event/'.$eventId.'/buat-tiket');
    }

    public function postTicket(Request $request, $id){
        $request->validate([
            'nama_tiket' => 'required',
            'harga_tiket' => 'required',
            'jumlah_tiket' => 'required',
        ]);

        TicketCategory::create([
            'event_id' => $id,
            'name' => $request->nama_tiket,
            'price' => $request->harga_tiket,
            'count' => $request->jumlah_tiket
        ]);

        return redirect('/');
        // dd($request->all(), $id);
    }

    public function eventTicket(Event $event){
        return view('make_ticket_categories', [
            "title" => "Buat Tiket",
            "eventId" => $event->id,
        ]);
    }

    public function eventlist(){
        
        // dd($events->count());

        return view('events',[
            "title" => "Semua Event",
            "events" => Event::filter(request(['search', 'category']))->get()
        ]);
    }
}
