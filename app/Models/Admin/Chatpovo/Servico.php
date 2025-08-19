<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servico extends Model
{
    protected $table = 'servicos';
    //protected $connection = 'chatpovo';
    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'cidade_id',
        'nome',
        'descricao',
        'cor',
        'icone',
        'ordem',
        'tipo',
        'conteudo',
        'ativo',
        'key',
        'formulario_customizado',
        'formulario_ativo',
        'permite_protocolo_sem_formulario',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'formulario_customizado' => 'boolean',
        'formulario_ativo' => 'boolean',
        'permite_protocolo_sem_formulario' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }
 
    /**
     * Relacionamento: Um serviço pode ter vários formulários
     */
    public function campos(): HasMany
    {
        return $this->hasMany(FormularioCampo::class, 'servico_id', 'id');
    }

    public function formularios(): HasMany
    {
        return $this->hasMany(FormularioPersonalizado::class, 'servico_id', 'id');
    }
    /**
     * Relacionamento: Formulário ativo (mais recente e ativo)
     */
    public function formularioAtivo(): HasMany
    {
        return $this->servico_formularios()
                    ->where('ativo', true)
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Relacionamento: Campos dos formulários através dos formulários
     */
    public function camposs(): HasManyThrough
    {
        return $this->hasManyThrough(
            FormularioCampo::class,
            ServicoFormulario::class,
            'servico_id',      // Foreign key na tabela servico_formularios
            'formulario_id',   // Foreign key na tabela formulario_campos
            'id',              // Local key na tabela servicos
            'id'               // Local key na tabela servico_formularios
        );
    }

    /**
     * Relacionamento: Campos do formulário ativo
     */
    public function camposAtivos(): HasManyThrough
    {
        return $this->campos()
                    ->whereHas('formulario', function ($query) {
                        $query->where('ativo', true);
                    })
                    ->where('ativo', true)
                    ->orderBy('ordem');
    }

    /**
     * Verificar se o serviço tem formulário customizado
     */
    public function formularioCustomizado(): bool
    {
        return $this->formulario_customizado && $this->formularios()->where('ativo', true)->exists();
    }

    /**
     * Obter o formulário principal (mais recente e ativo)
     */
    public function getFormularioPrincipal()
    {
        return $this->formularios()
                    ->where('ativo', true)
                    ->with(['campos' => function ($query) {
                        $query->where('ativo', true)->orderBy('ordem');
                    }])
                    ->orderBy('created_at', 'desc')
                    ->first();
    }


}
