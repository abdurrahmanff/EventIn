<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getPayment(Transaction $transaction)
    {
        $user = User::where('id', $transaction->user_id)->first();
        if(Auth::user()->id == $transaction->user_id){
            return view('payment', [
                "title" => "Payment",
                "transaction" => $transaction,
                "user" => $user
            ]);
        }
        else{
            abort('404');
        }
    }
}
