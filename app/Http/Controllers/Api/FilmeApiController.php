<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Filme;

class FilmeApiController extends Controller
{
    public function index()
    {
        $data = Filme::all();
        return response()->json($data);
    }


    public function locacoes($id, Filme $filme)
    {
        $data = $filme->with('alugados')->find($id);
        return response()->json($data);
    }
}
