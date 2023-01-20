<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoriaRequest extends FormRequest
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
            'categoria_id' => ['required', 'integer'],
            'sc_nombre' => ['required', 'string'],
            'sc_descripcion' => ['required', 'string'],
        ];

    }
    public function messages()
    {
        return [
            'sc_nombre.required' => 'El nombre de la Sub categoria es requerido',
            'sc_descripcion.required' => 'La descripcioin de la Sub categoria es requerida',
            'categoria_id.required' => 'Es necesario seleccionar una categoria',
            'categoria_id.integer' => 'El valor de la categoria debe ser un numero entero',
        ];
    }
}
