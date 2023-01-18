<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'categoria_id' => $this->categoria_id,
            'categoria_nombre' => $this->categoria_nombre,
            'categoria_descripcion' => $this->categoria_descripcion,
        ];

    }
}
