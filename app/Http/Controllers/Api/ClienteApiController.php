<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Validator;

class ClienteApiController extends Controller
{

    public function __construct(Cliente $cliente, Request $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->cliente->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $valida = Validator::make($request->all(), $this->cliente->rules(), $this->cliente->customMessages());

        if ($valida->fails()) {
            $error = ['error'=>$valida->errors()->all()];
            return response()->json($error, 400);
        } else {
            $dataForm = $request->all();
            $data = $this->cliente->create($dataForm);
            return response()->json($data, 201);
        }
    }
}
