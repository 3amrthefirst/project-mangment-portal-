<?php

namespace App\Models\status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmStatusIssue extends Model
{
    use HasFactory;

    const STATUS = [
        1 => 'pending',
        2 => 'in_progress',
        3 => 'hold',
        4 => 'completed'
    ];

    protected $fillable = ['ticket_id', 'pm_status_id', 'status', 'title', 'note'];


}
