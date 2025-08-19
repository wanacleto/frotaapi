<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;

class ServicoFormulario extends Model
{
    protected $table = 'servico_formularios';
    //protected $connection = 'chatpovo';
    protected $hidden = ['serial']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'servico_id', 'nome', 'descricao', 'versao', 'ativo', 'permite_fotos', 'max_fotos', 'fotos_obrigatorias', 'permite_localizacao', 'localizacao_obrigatoria'
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


    /**
     * Relacionamento: O formulário pertence a um serviço
     */
    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

    /**
     * Relacionamento: Um formulário tem vários campos
     */
    public function campos(): HasMany
    {
        return $this->hasMany(FormularioCampo::class, 'formulario_id');
    }

    /**
     * Relacionamento: Campos ativos ordenados por ordem
     */
    public function camposAtivos(): HasMany
    {
        return $this->campos()
                    ->where('ativo', true)
                    ->orderBy('ordem');
    }

    /**
     * Relacionamento: Campos obrigatórios
     */
    public function camposObrigatorios(): HasMany
    {
        return $this->campos()
                    ->where('ativo', true)
                    ->where('obrigatorio', true)
                    ->orderBy('ordem');
    }

    /**
     * Scope: Formulários ativos
     */
    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Scope: Formulários por versão
     */
    public function scopeVersao($query, $versao)
    {
        return $query->where('versao', $versao);
    }

    /**
     * Obter estrutura completa do formulário para API
     */
    public function getEstruturaCompleta()
    {
        return [
            'formulario' => $this->toArray(),
            'campos' => $this->camposAtivos()->get()->toArray(),
            'configuracoes' => [
                'permite_fotos' => $this->permite_fotos,
                'max_fotos' => $this->max_fotos,
                'fotos_obrigatorias' => $this->fotos_obrigatorias,
                'permite_localizacao' => $this->permite_localizacao,
                'localizacao_obrigatoria' => $this->localizacao_obrigatoria,
            ]
        ];
    }

    /**
     * Validar se todas as configurações estão corretas
     */
    public function validarConfiguracoes()
    {
        if ($this->permite_fotos && $this->max_fotos <= 0) {
            return false;
        }

        return true;
    }

}
