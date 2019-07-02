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
}
