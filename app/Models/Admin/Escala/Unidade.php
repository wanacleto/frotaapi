<?php

namespace App\Models\Admin\Escala;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
        protected $table = 'unidades';
        protected $fillable = [
            "nome",
            "status",
        ];
}
