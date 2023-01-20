<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{

    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'sc_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'categoria_id',
        'sc_nombre',
        'sc_descripcion',
    ];

    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
}
