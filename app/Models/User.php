<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Str;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'password',
        'serial',
        'cidade_id',
        'nome',
        'social',
        'email',
        'cpf',
        'telefone',
        'foto_perfil',
        'foto_doc',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'situacao',
        'nota_situacao',
        'ativo',
        'key',
        'fcm_token'
    ];
    protected $hidden = ['password', 'serial', 'key', 'remember_token'];
    protected $appends = ['foto_perfil_url', 'foto_doc_url'];
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getFotoPerfilAttribute()
    {
        $foto = $this->attributes['foto_perfil'] ?? null;
    
        if ($foto) {
            return asset('storage/' . $foto);
        }
        return null; // ou asset('images/doc-default.png');
        // return asset('images/avatar-default.png'); // opcional
    }
    
    public function getFotoDocAttribute()
    {
        $fotoDoc = $this->attributes['foto_doc'] ?? null;

        if ($fotoDoc) {
            return asset('storage/' . $fotoDoc);
        }

        return null;
    }

    public function getFotoPerfilUrlAttribute()
    {
        $foto = $this->attributes['foto_perfil'] ?? null;
    
        if ($foto) {
            return asset('storage/' . $foto);
        }
        return null; // ou asset('images/doc-default.png');
        // return asset('images/avatar-default.png'); // opcional
    }

    public function getFotoDocUrlAttribute()
    {
        $fotoDoc = $this->attributes['foto_doc'] ?? null;

        if ($fotoDoc) {
            return asset('storage/' . $fotoDoc);
        }

        return null;
    }
}
