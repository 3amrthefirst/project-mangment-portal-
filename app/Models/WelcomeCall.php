<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WelcomeCall extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'any_locked_gates',
        'any_dogs',
        'any_unpermitted',
        'comment',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
