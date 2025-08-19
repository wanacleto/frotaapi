<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProtocoloAtualizacao extends Model
{
    use HasFactory;

    protected $table = 'protocolo_atualizacoes';
   // protected $connection = 'chatpovo';

    protected $hidden = ['serial']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
       'protocolo_id', 'user_id', 'gestor_id', 'descricao', 'status',
    ];


    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

}
