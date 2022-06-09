<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function getPayment(Transaction $transaction)
    {
        $user = User::where('id', $transaction->user_id)->first();
        $transaction_detail = TransactionDetail::where('transaction_id', $transaction->id)->get();
        $sum = 0;
        foreach($transaction_detail as $ticket){
            $sum += $ticket->ticket_category->price * $ticket->count;
        }
        if(Auth::user()->id == $transaction->user_id){
            return view('payment', [
                "title" => "Payment",
                "transaction" => $transaction,
                "user" => $user,
                "event" => Event::where('id', $transaction->event_id)->first(),
                "transaction_detail" => $transaction_detail,
                "sum" => $sum
            ]);
        }
        else{
            abort('404');
        }
    }

    public function confirmPayment(Transaction $transaction){
        $transaction->status = 0;
        $transaction->save();
        return redirect('/profil/transaksi')->with('success', 'Pembelian Berhasil, Upload Bukti untuk dikonfirmasi');
    }

    public function getUserTransaction() {
        $transactions = Transaction::where('user_id', Auth::user()->id)->paginate(10);
        return view('transaction_history',[
            'title' => 'Riwayat Transaksi',
            'transactions' => $transactions,
        ]);
    }

    public function uploadPaymentProof(Request $request, Transaction $transaction) {
        // dd($request);
        $request->validate([
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = $transaction->id.'.jpg';
        if($request->file('img_path')){
            Storage::disk('public')->putFileAs('transaction-proof', $request->file('img_path'), $filename);
        }
        // dd($filename);

        $transaction->img_path = 'transaction-proof/'.$filename;
        $transaction->save();

        return redirect()->back()->with('success', 'Upload Proof of Payment Success');
    }

    public function eventUser(Event $event) {
        if(Auth::user()->id != $event->user_id){
            abort('404');
        }

        $transactions = Transaction::where('event_id', $event->id)->paginate(10);
        return view('event_user_list',[
            'title' => 'Riwayat Transaksi',
            'transactions' => $transactions,
            'event' => $event,
        ]);
        // dd($transactions);
    }

    public function acceptTicket(Transaction $transaction) {
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('success', 'Tiket Diterima');
    }

    public function rejectTicket(Transaction $transaction) {
        $transaction->status = 2;
        $transaction->save();
        return redirect()->back()->with('success', 'Tiket Ditolak');
    }
}
