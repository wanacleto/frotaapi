<?php

namespace App\Models\Admin\Escala;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';
    protected $fillable = [
        "nome",
        "status",
    ];
}
