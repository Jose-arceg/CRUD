<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'region_id';

    public function Provincia(){
        return $this->hasmany(Provincia::class,'region_id','region_id');
    }

}

