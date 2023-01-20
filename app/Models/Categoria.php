<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{

    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'categoria_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'categoria_nombre',
        'categoria_descripcion',
    ];

    public function Subcategoria()
    {
        return $this->hasMany(Subcategoria::class, 'categoria_id', 'categoria_id');
    }

    public function Producto()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'categoria_id');
    }
}
