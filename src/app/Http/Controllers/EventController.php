<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function eventAdmin(Event $event){
        if(Auth::user()->role_id != 1){
            abort(404);
        }
        return view('admin_event_detail', [
            "title" => "Detail Event (Admin)",
            "event" => $event,
            "tickets" => TicketCategory::where('event_id', $event->id)->get(),
            "user" => User::where('id', $event->user_id)->first()->name
        ]);
    }

    public function postEvent(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:events',
            'kategori' => 'required',
            'from_date' => 'date|required',
            'to_date' => 'date|required',
            'from_time' => 'required',
            'to_time' => 'required',
            'image' => 'image',
            'deskripsi_event' => 'required|max:255',
            'deskripsi_event' => 'required|max:255',
            'lokasi_event' => 'required|max:255',
        ]);

        // dd($user_id);
        // dd($request);
        $filename = $request->input('name'). '-' . time(). rand(1,100) . '.jpg';
        if($request->file('image')){
            Storage::disk('public')->putFileAs('event-covers', $request->file('image'), $filename);
        }

        Event::create([
            'category_id' => $request->kategori,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'schedule' => $request->from_date.' '.$request->from_time.":00",
            'end_schedule' => $request->to_date.' '.$request->to_time.":00",
            'desc' => $request->deskripsi_event,
            'place' => $request->lokasi_event,
            'img_path' => 'event-covers/' . $filename,
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

        return redirect('/buat-event/'.$id.'/buat-tiket')->with('success', 'Tiket berhasil ditambahkan');
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
            "events" => Event::filter(request(['search', 'category']))->where('status', 1)->get()
        ]);
    }

    public function acceptEvent(Event $event){
        $event->status = 1;
        $event->save();
        return back()->with('success', 'Event berhasil diterima');
        // dd($event);
    }

    public function rejectEvent(Event $event){
        $event->status = 2;
        $event->save();
        return back()->with('success', 'Event berhasil ditolak');
    }

    public function buyTicket(Request $request, $id){

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'timestamp' => Carbon::now('Asia/Jakarta'),
            'status' => 0,
            'event_id' => $id
        ]);

        $transactionId = $transaction->id;
        foreach(TicketCategory::where('event_id', $id)->get() as $ticket){
            $name = $ticket->name;
            TransactionDetail::create([
                'transaction_id' => $transactionId,
                'ticket_category_id' => $ticket->id,
                'count' => $request[preg_replace('/\s+/', '_', $name)]
            ]);
        }


        return redirect('/payment/'.$transactionId);
    }

    public function yourEvents(){
        return view('event_list',[
            'title' => 'Daftar Event',
            'events' => Event::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10)
            // Event::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
