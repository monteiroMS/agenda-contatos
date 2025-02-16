<?php

namespace App\Http\Requests\Contato;

use Illuminate\Foundation\Http\FormRequest;

class CriaContatoRequest extends FormRequest
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
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:50',
            'telefone' => ['required', 'string', 'regex:/^\(?\d{2}\)?[-.\s]?\d{4,5}[-.\s]?\d{4}$/'],
            'cep' => 'required|string|size:9',
            'logradouro' => 'required|string|min:3|max:50',
            'numero' => 'nullable|string',
            'complemento' => 'nullable|string',
            'bairro' => 'required|string|min:3|max:50',
            'localidade' => 'required|string|min:3|max:50',
            'uf' => 'required|string|size:2',
        ];
    }
}
