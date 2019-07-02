<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'cliente_nome',
        'cliente_imagem',
        'cliente_documento',
    ];

    public function rules()
    {
        return [
            'cliente_nome' => 'required',
            'cliente_imagem' => 'image',
            'cliente_documento' => 'required|unique:clientes'
        ];
    }

    public function customMessages()
    {
        return [
            'cliente_nome.required' => 'Nome do cliente é obrigatório',
            'cliente_documento.required' => 'Documento CPF/CPNJ é obrigatório',
            'cliente_documento.unique' => 'Este docuemnto já existe cadastrado no aplicativo',
        ];
    }
}
