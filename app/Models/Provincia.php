<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'provincia_id';

    public function Comuna(){
        return $this->hasmany(Comuna::class,'provincia_id','provincia_id');
    }

    public function Region(){
        return $this->belognsTo(Region::class,'region_id','region_id');
    }
}
