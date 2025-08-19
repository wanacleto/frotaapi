<?php

namespace App\Models\Admin\Frota;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable = [
        "profissional_id",
        "user_id",
        "nome",
        "cnh",
        "validade",
        "categoria",
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }
}
