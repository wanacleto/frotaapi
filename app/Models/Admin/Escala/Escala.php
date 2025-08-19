<?php

namespace App\Models\Admin\Escala;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    protected $table = 'escalas';
    protected $fillable = [
        'unidade_id',
        'categoria_id',
        "nome",
        "status",
    ];
}
