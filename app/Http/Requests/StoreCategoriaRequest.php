<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'categoria_nombre' => ['required','string'],
            'categoria_descripcion' => ['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'categoria_nombre.required' => 'El nombre de la categoria es requerido',
            'categoria_descripcion.required'  => 'La descripcioin de la categoria es requerida',
        ];
    }


}
