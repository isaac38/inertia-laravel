<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'apellidoP.required' => 'El apellido paterno es requerido',
            'apellidoM.required' => 'El apellido materno es requerido',
            'username.required' => 'El nombre de usuario es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.email' => 'El correo electronico debe ser un correo valido',
            'password.required' => 'La contraseña es requerida'
        ];
    }
}
