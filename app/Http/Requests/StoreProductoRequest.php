<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'categoria_id' => ['required','integer'],
            'producto_nombre' => ['required','string'],
            'producto_descripcion' => ['required','string'],
            'producto_stock' => ['required','integer'],
            'producto_valor' => ['required','integer'],
            'producto_alto' => ['required','integer'],
            'producto_ancho' => ['required','integer'],
            'producto_profundidad' => ['required','integer'],
            'producto_peso' => ['required','integer'],
        ];
    }
    public function messages()
    {
        return [
            'categoria_id.required' => 'Es necesario seleccionar una categoria',
            'producto_nombre.required'  => 'El nomnbre del producto es requerido',
            'producto_descripccion.required'  => 'La descripcion del producto es requerida',
            'producto_stock.required'  => 'El stock del producto es requerido',
            'producto_stock.integer'  => 'El stock debe ser un valor numerico entero',
            'producto_valor.required'  => 'El valor del producto es requerido',
            'producto_valor.integer'  => 'El valor debe ser un valor numerico entero',
            'producto_alto.required'  => 'El alto del producto es requerido',
            'producto_alto.integer'  => 'El alto debe ser un valor numerico entero',
            'producto_ancho.required'  => 'El ancho del producto es requerido',
            'producto_ancho.integer'  => 'El ancho debe ser un valor numerico entero',
            'producto_profundidad.required'  => 'La profundidad del producto es requerido',
            'producto_profundidad.integer'  => 'La profundidad debe ser un valor numerico entero',
            'producto_peso.required'  => 'El peso del producto es requerido',
            'producto_peso.integer'  => 'El peso debe ser un valor numerico entero',
        ];
    }
}
