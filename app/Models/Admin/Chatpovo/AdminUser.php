<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_users';
    protected $connection = 'chatpovo';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
       'nome', 'social', 'email', 'cpf', 'telefone', 'ativo',
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
