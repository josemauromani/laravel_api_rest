<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreRequest;
use App\Models\Cliente;
use Image;
use Storage;

class ClienteApiController extends Controller
{

    public function index()
    {
        $data = Cliente::all();
        return response()->json($data);
    }

    public function store(StoreRequest $request, Cliente $cliente)
    {

        $dataForm = $request->all();

        if ($request->hasFile('cliente_imagem') && $request->file('cliente_imagem')->isValid()) {

            $ext = $request->cliente_imagem->extension();
            $nome = kebab_case($request->cliente_nome)."_".uniqid(date('His'));
            $arquivo = "{$nome}.{$ext}";

            $upload = Image::make($dataForm['cliente_imagem'])->resize(500)->save(storage_path("app\\public\\clientes\\$arquivo"), 70);
            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload da imagem'], 500);
            } else {
                $dataForm['cliente_imagem'] = $arquivo;
            }
        }

        $data = $cliente->create($dataForm);
        return response()->json($data, 201);
    }


    public function show($id, Cliente $cliente) {
        
        $data = $cliente->find($id);
        if (!$data) {
            return response()->json(['error'=>'Cliente não encontrado'],404);
        } else {
            return response()->json($data);
        }

    }

    public function destroy($id) {

        $data = Cliente::find($id);
        if (!$data) {
            return response()->json(['error'=>'Usuário não encontrado'],404);
        } else {
            if ($data->cliente_imagem) {
                Storage::disk('public')->delete("clientes/$data->cliente_imagem");
            }
            $data->delete();
            return response()->json(['succcess'=>'Usuário excluído com sucesso.'],200);
        }

    }


}
