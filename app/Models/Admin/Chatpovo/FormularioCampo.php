<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FormularioCampo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'formulario_campos';
    //protected $connection = 'chatpovo';
    protected $hidden = ['serial']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }


    protected $fillable = [
        'formulario_id',
        'nome',
        'label',
        'tipo',
        'obrigatorio',
        'ordem',
        'placeholder',
        'keyboard_type',
        'multiline',
        'number_of_lines',
        'validacao',
        'opcoes',
        'condicional',
        'estilo',
        'ativo'
    ];

    protected $casts = [
        'obrigatorio' => 'boolean',
        'multiline' => 'boolean',
        'ativo' => 'boolean',
        'ordem' => 'integer',
        'number_of_lines' => 'integer',
        'validacao' => 'array',
        'opcoes' => 'array',
        'condicional' => 'array',
        'estilo' => 'array',
    ];

    /**
     * Tipos de campo permitidos
     */
    const TIPOS_CAMPO = [
        'text',
        'textarea',
        'select',
        'radio',
        'checkbox',
        'date',
        'time',
        'number',
        'phone',
        'email',
        'file',
        'hidden'
    ];

    /**
     * Tipos de teclado permitidos
     */
    const KEYBOARD_TYPES = [
        'default',
        'numeric',
        'phone-pad',
        'email-address',
        'decimal-pad'
    ];

    /**
     * Relacionamento: O campo pertence a um serviço (através do formulário)
     */
    public function servico(): BelongsTo
    {
        return $this->formulario->servico();
    }

    /**
     * Scope: Campos ativos
     */
    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Scope: Campos obrigatórios
     */
    public function scopeObrigatorio($query)
    {
        return $query->where('obrigatorio', true);
    }

    /**
     * Scope: Ordenar por ordem
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('ordem');
    }

    /**
     * Scope: Por tipo de campo
     */
    public function scopeTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Verificar se o campo é do tipo select/radio/checkbox (tem opções)
     */
    public function temOpcoes(): bool
    {
        return in_array($this->tipo, ['select', 'radio', 'checkbox']) && !empty($this->opcoes);
    }

    /**
     * Verificar se o campo é condicional
     */
    public function ehCondicional(): bool
    {
        return !empty($this->condicional);
    }

    /**
     * Obter validações formatadas para o frontend
     */
    public function getValidacoesFormatadas()
    {
        $validacoes = $this->validacao ?? [];
        
        return [
            'obrigatorio' => $this->obrigatorio,
            'min_length' => $validacoes['min_length'] ?? null,
            'max_length' => $validacoes['max_length'] ?? null,
            'pattern' => $validacoes['pattern'] ?? null,
            'min_value' => $validacoes['min_value'] ?? null,
            'max_value' => $validacoes['max_value'] ?? null,
        ];
    }

    /**
     * Obter configurações do campo para o React Native
     */
    public function getConfiguracaoReactNative()
    {
        return [
            'nome' => $this->nome,
            'label' => $this->label,
            'tipo' => $this->tipo,
            'obrigatorio' => $this->obrigatorio,
            'placeholder' => $this->placeholder,
            'keyboardType' => $this->keyboard_type,
            'multiline' => $this->multiline,
            'numberOfLines' => $this->number_of_lines,
            'validacao' => $this->getValidacoesFormatadas(),
            'opcoes' => $this->opcoes,
            'estilo' => $this->estilo,
            'condicional' => $this->condicional,
            'ordem' => $this->ordem,
        ];
    }

    /**
     * Validar valor do campo
     */
    public function validarValor($valor)
    {
        $validacoes = $this->validacao ?? [];
        
        // Campo obrigatório
        if ($this->obrigatorio && empty($valor)) {
            return ['erro' => 'Campo obrigatório'];
        }

        // Comprimento mínimo
        if (isset($validacoes['min_length']) && strlen($valor) < $validacoes['min_length']) {
            return ['erro' => "Mínimo de {$validacoes['min_length']} caracteres"];
        }

        // Comprimento máximo
        if (isset($validacoes['max_length']) && strlen($valor) > $validacoes['max_length']) {
            return ['erro' => "Máximo de {$validacoes['max_length']} caracteres"];
        }

        // Padrão regex
        if (isset($validacoes['pattern']) && !preg_match('/' . $validacoes['pattern'] . '/', $valor)) {
            return ['erro' => 'Formato inválido'];
        }

        return ['valido' => true];
    }
}
