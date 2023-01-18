<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    use HasFactory;
    protected $primaryKey = 'region_id';

    public function Comuna(){
        return $this->hasmany(Comuna::class,'region_code','region_code');
    }

}

