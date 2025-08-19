<?php

namespace App\Models\Admin\Frota;

use Illuminate\Database\Eloquent\Model;

class TipoManutencao extends Model
{
    protected $fillable = [
        "nome",
        "status"
    ];
}
