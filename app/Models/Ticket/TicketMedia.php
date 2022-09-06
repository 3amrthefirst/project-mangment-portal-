<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['ticket_id', 'lead_id', 'type', 'url'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

