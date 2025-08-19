<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Protocolo extends Model
{
    use HasFactory;

    protected $table = 'protocolos';
    //protected $connection = 'chatpovo';

    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
      'servico_id', 'cidade_id', 'user_id', 'tipo_protocolo', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'descricao', 'telefone', 'status', 'atualizacoes_nao_lidas', 'precisa_resposta', 'ativo', 'latitude', 'longitude'
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
