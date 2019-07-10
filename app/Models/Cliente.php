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

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }

    public function alugados()
    {
        return $this->belongsToMany('App\Models\Filme', 'locacoes');
    }
}
