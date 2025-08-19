<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'sistemas';
    // protected $connection = 'chatpovo';

    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    protected $fillable = [
        'serial', 'api', 'nome', 'logo', 'descricao', 'cor', 'icone', 'ativo', 'key'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }

}
