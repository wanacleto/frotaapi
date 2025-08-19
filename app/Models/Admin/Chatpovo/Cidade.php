<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    // protected $connection = 'chatpovo';

    //protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    protected $fillable = [
        'serial', 'nome', 'slug', 'site', 'estado', 'nome_banco_dados', 'logo_prefeitura', 'brasao', 'cor_principal', 'telefone_prefeitura', 'email_ouvidoria', 'ativo', 'key',
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
