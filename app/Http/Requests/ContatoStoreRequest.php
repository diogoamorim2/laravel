<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoStoreRequest extends FormRequest
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
            'fax' => 'prohibited', // Honeypot field: must be empty or missing
            'nome' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'assunto' => 'nullable|string|max:255',
            'telefone_fixo' => ['nullable', 'string', 'max:20', 'regex:/^[\d\s\(\)\-\+]+$/'],
            'telefone_celular' => ['nullable', 'string', 'max:20', 'regex:/^[\d\s\(\)\-\+]+$/'],
            'empresa_nome' => 'nullable|string|max:255',
            'empresa_contato' => 'nullable|string|max:255',
            'comentario' => 'nullable|string|max:2000',
            'ativo' => 'nullable|bool',
            'newslatter' => 'nullable|boolean',
        ];
    }
}
