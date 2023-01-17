<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey ='pedidos_id';
    protected $fillable = [
        'pedidos_cliente',
        'pedidos_direccion',
        'pedidos_numero',
        'pedidos_correo',
        'pedidos_fecha',
        'pedidos_sucursal'

    ];

    public function detalle_pedido(){
        return $this->hasMany(detalle_pedido::class,'pedidos_id','pedidos_id');
    }

}
