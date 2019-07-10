<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Telefone;

class TelefoneApiController extends Controller
{
    public function index()
    {
        $data = Telefone::all();
        return response()->json($data, 200);
    }


    public function clientes($id, Telefone $tel)
    {
        $data = $tel->with('clientes')->find($id);
        return response()->json($data);
    }
}
