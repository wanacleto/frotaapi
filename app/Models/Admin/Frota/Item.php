<?php

namespace App\Models\Admin\Frota;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        "nome",
        "descricao",
        "ordem",
        "status"
    ];
}
