<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Dist_id',
        'State_id',
        'WorkHours',
        'Email',
        'Phone',
        'Address',
        'Lat',
        'Long',
        'Zip',
        'County'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function Distributions(){
        return $this->belongsTo(Distributer::class,'Dist_id','id');
    }

}
