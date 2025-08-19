<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;

class Personalizado extends Model
{
    protected $table = 'personalizados';
    //protected $connection = 'chatpovo';

    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'servico_id', 'user_id', 'descricao', 'key',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }
}
