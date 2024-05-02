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
            'nome' => 'nullable|string',
            'email' => 'required',
            'assunto' => 'nullable|string',
            'telefone_fixo' => 'nullable|integer|min:1|max:15',
            'telefone_celular' => 'nullable|integer|min:1|max:15',
            'empresa_nome' => 'nullable|string',
            'empresa_contato' => 'nullable|string',
            'comentario' => 'nullable|string',
            'ativo' => 'nullable|bool',
            'newslatter' => 'nullable|string'
        ];
    }
}
