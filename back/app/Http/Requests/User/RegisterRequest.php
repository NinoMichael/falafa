<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:visitor,promoter,agency',
            'contact' => 'required|string',

            'company_name' => 'sometimes|required_if:role,agency|string',
            'nif' => 'sometimes|required_if:role,agency|string',
            'stat' => 'sometimes|required_if:role,agency|string',
            'responsible_name' => 'sometimes|required_if:role,agency|string',
        ];
    }
}
