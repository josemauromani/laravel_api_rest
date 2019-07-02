<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_nome' => 'required',
            'cliente_imagem' => 'image|mimes:png,jpg,jpeg',
            'cliente_documento' => 'required|unique:clientes'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cliente_nome.required' => 'Nome do cliente é obrigatório',
            'cliente_documento.required' => 'Documento CPF/CPNJ é obrigatório',
            'cliente_documento.unique' => 'Este docuemnto já existe cadastrado no aplicativo',
            'cliente_imagem.mimes' => 'O formato da imagem não é suportado.',
        ];
    }
}
