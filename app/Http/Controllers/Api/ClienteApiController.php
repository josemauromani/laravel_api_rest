<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreRequest;
use App\Models\Cliente;
use Image;

class ClienteApiController extends Controller
{

    public function __construct(Cliente $cliente, StoreRequest $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->cliente->all();
        return response()->json($data);
    }

    public function store()
    {

        $dataForm = $this->request->all();

        if ($this->request->hasFile('cliente_imagem') && $this->request->file('cliente_imagem')->isValid()) {

            $ext = $this->request->cliente_imagem->extension();
            $nome = kebab_case($request->cliente_nome)."_".uniqid(date('His'));
            $arquivo = "{$nome}.{$ext}";

            $upload = Image::make($dataForm['cliente_imagem'])->resize(500)->save(storage_path("app\\public\\clientes\\$arquivo"), 70);
            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload da imagem'], 500);
            } else {
                $dataForm['cliente_imagem'] = $arquivo;
            }
        }

        $data = $this->cliente->create($dataForm);
        return response()->json($data, 201);
    }
}
