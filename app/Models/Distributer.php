<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function DistLocation(){
        return $this->hasMany(DistLocation::class,'Dist_id','id');
    }

}
