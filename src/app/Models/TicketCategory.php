<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;
    public $timestamp = false;

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
