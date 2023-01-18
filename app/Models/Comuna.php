<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $primaryKey = 'id_comuna';

    public function Region(){
        return $this->belongsTo(Region::class,'region_code','region_code');
    }
}
