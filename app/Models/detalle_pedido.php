<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'dt_id';
    protected $fillable = [
        'pedidos_id',
        'producto_id',
        'dt_cantidad',
        'dt_valor',
        'dt_subtotal',
    ];

    public function Pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidos_id', 'pedidos_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
    }

}
