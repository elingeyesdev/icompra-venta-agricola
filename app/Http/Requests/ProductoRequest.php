<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categoria_id' => [
                'required',
                'integer',
                'exists:categorias,id',
            ],
            'unidad_medida_id' => [
                'required',
                'integer',
                'exists:unidad_medidas,id',
            ],
            'nombre' => [
                'required',
                'string',
                'max:255',
            ],
            'descripcion' => [
                'required',
                'string',
                'max:255',
            ],
            'precio' => [
                'required',
                'numeric',
                'min:0',
            ],
            'estado' => [
                'required',
                'integer',
                'in:0,1',
            ],
        ];
    }
}