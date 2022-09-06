<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterSpot extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'is_mpu',
        'status',
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function charter(){
        return $this->belongsTo('App\Models\Charter','project_id','id');
    }

}
