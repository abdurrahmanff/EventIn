<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $transaction->status = 1;
        $transaction->save();
        return redirect('/')->with('success', 'Payment Success');
    }

    public function getUserTransaction() {
        return view('transaction_history',[
            'title' => 'Riwayat Transaksi',
            'transactions' => Transaction::where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }
}
