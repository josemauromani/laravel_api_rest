<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    public $fillable = [
        'filme_titulo',
        'filme_capa'
    ];

    public function alugados()
    {
        return $this->belongsToMany('App\Models\Cliente', 'locacoes');
    }
}
