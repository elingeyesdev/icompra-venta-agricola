<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Cambiado a true para que te permita usarlo
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => $userId
                ? ['nullable', 'string', Password::defaults()]
                : ['required', 'string', Password::defaults()],
        ];
    }
}