<?php

namespace App\Models\Admin\Chatpovo;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'usuarios';
    //protected $connection = 'chatpovo';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
         'nome', 'social', 'email', 'password', 'cpf', 'telefone', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'foto_perfil', 'ativo'
     ];
     protected $hidden = ['password', 'serial', 'key'];
     
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

}
