<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designer_License extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "designer_licenses";

    protected $fillable = [
        'id',
        'designer_id',
        'state_id',
        'num_license',
        'license_holder',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function designer(){
        return $this->belongsTo(Designer::class);
    }

}
