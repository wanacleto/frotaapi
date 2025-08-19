<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formulario extends Model
{
    protected $table = 'formularios';
    //protected $connection = 'chatpovo';
    protected $hidden = ['serial']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'servico_id', 'nome', 'label', 'tipo', 'obrigatorio', 'ordem', 'placeholder', 'keyboard_type', 'multiline', 'number_of_lines', 'validacao', 'opcoes', 'condicional', 'estilo', 'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

}
