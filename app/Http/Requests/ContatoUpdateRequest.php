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
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $fields = ['nome', 'assunto', 'comentario', 'empresa_nome', 'empresa_contato'];
        $input = [];

        foreach ($fields as $field) {
            if ($this->has($field) && $this->input($field) !== null) {
                $input[$field] = strip_tags($this->input($field));
            }
        }

        $this->merge($input);
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
