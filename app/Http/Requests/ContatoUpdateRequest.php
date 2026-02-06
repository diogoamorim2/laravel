<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoUpdateRequest extends FormRequest
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
            'nome' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'assunto' => 'nullable|string|max:255',
            'telefone_fixo' => 'nullable|string|max:20',
            'telefone_celular' => 'nullable|string|max:20',
            'empresa_nome' => 'nullable|string|max:255',
            'empresa_contato' => 'nullable|string|max:255',
            'comentario' => 'nullable|string|max:2000',
            'ativo' => 'nullable|bool',
            'newslatter' => 'nullable|string',
        ];
    }
}
