<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        // Campos de la tabla 'compras'
        'proveedor_id' => 'required|exists:proveedores,id',
        'fecha_compra' => 'required|date',
        'total_compra' => 'required|numeric',
        'estado'       => 'required',

        // Campos necesarios para el detalle y el stock
        // (Aunque no estén en la tabla 'compras', los necesitamos para el proceso)
        'producto_id'  => 'required|exists:productos,id',
        'cantidad'     => 'required|integer|min:1',
        'precio'       => 'required|numeric|min:0',
    ];
    }
}
