<?php

namespace App\Models\Admin\Frota;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        "nome",
        "marca",
        "placa",
    ];
}
