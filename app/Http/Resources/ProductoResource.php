<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'productoId' => $this->producto_id,
            'categoriaId' => $this->categoria_id,
            'productoNombre' => $this->producto_nombre,
            'productoDescripcion' => $this->producto_descripcion,
            'productoStocck' => $this->producto_stock,
            'productoValor' => $this->producto_valor,
        ];
    }
}
