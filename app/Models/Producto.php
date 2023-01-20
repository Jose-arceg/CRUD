<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'producto_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'categoria_id',
        'producto_nombre',
        'producto_descripcion',
        'producto_stock',
        'producto_valor',
        'producto_alto',
        'producto_ancho',
        'producto_profundidad',
        'producto_peso',
    ];

    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
    public function detalle_pedido()
    {
        return $this->belongsTo(detalle_pedido::class, 'producto_id', 'producto_id');
    }
}
