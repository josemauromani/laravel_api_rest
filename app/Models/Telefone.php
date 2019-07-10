<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cliente;

class Telefone extends Model
{
    protected $fillable = [
        'telefone_ddd',
        'telefone_numero',
        'cliente_id',
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
