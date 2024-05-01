<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewslatterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Insira um email válido'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Insira um email válido',
        ];
    }
}
