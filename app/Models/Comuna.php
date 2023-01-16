<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_comuna';

    public function Provincia(){
        return $this->belongsTo(Provincia::class,'provincia_id','provincia_id');
    }
}
