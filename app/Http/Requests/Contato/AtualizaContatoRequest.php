<?php

namespace App\Http\Requests\Contato;

use Illuminate\Foundation\Http\FormRequest;

class AtualizaContatoRequest extends FormRequest
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
            'id' => 'required|integer',
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:50|unique:contatos,email,'.$this->id,
            'telefone' => ['required', 'string', 'regex:/^\(?\d{2}\)?[-.\s]?\d{4,5}[-.\s]?\d{4}$/', 'unique:contatos,telefone,'.$this->id],
            'cep' => 'required|string|size:9',
            'logradouro' => 'required|string|min:3|max:50',
            'numero' => 'nullable|string',
            'complemento' => 'nullable|string',
            'bairro' => 'required|string|min:3|max:50',
            'localidade' => 'required|string|min:3|max:50',
            'uf' => 'required|string|size:2',
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 50 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email deve ter no máximo 50 caracteres.',
            'email.unique' => 'O email informado já está em uso.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.unique' => 'O telefone informado já pertence a um contato existente.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'cep.string' => 'O campo CEP deve ser uma string.',
            'cep.size' => 'O campo CEP deve ter exatamente 9 caracteres.',
            'logradouro.required' => 'O campo logradouro é obrigatório.',
            'logradouro.string' => 'O campo logradouro deve ser uma string.',
            'logradouro.min' => 'O campo logradouro deve ter no mínimo 3 caracteres.',
            'logradouro.max' => 'O campo logradouro deve ter no máximo 50 caracteres.',
            'numero.string' => 'O campo número deve ser uma string.',
            'complemento.string' => 'O campo complemento deve ser uma string.',
            'bairro.required' => 'O campo bairro é obrigatório.',
            'bairro.string' => 'O campo bairro deve ser uma string.',
            'bairro.min' => 'O campo bairro deve ter no mínimo 3 caracteres.',
            'bairro.max' => 'O campo bairro deve ter no máximo 50 caracteres.',
            'localidade.required' => 'O campo localidade é obrigatório.',
            'localidade.string' => 'O campo localidade deve ser uma string.',
            'localidade.min' => 'O campo localidade deve ter no mínimo 3 caracteres.',
            'localidade.max' => 'O campo localidade deve ter no máximo 50 caracteres.',
            'uf.required' => 'O campo UF é obrigatório.',
            'uf.string' => 'O campo UF deve ser uma string.',
            'uf.size' => 'O campo UF deve ter exatamente 2 caracteres.',
        ];
    }
}
