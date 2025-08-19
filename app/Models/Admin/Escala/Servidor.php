<?php

namespace App\Models\Admin\Escala;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = 'servidores';
    protected $fillable = [
        "nome",
        'matricula',
        'cpf',
        "status",
    ];
}
