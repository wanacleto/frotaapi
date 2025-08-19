<?php

namespace App\Models\Admin\Escala;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        "nome",
        "status",
    ];
}
