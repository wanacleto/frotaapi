<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';
    //protected $connection = 'chatpovo';
    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
       'protocolo_id', 'user_id', 'gestor_id', 'tipo', 'titulo', 'mensagem', 'lida'
    ];


    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }

}
