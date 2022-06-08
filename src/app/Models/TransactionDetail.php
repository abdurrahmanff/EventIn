<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'transaction_id',
        'ticket_category_id',
        'count',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function ticket_category()
    {
        return $this->belongsTo(TicketCategory::class);
    }
}
