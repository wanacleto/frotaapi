<?php

namespace App\Models\Admin\Chatpovo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProtocoloFoto extends Model
{
    use HasFactory;

    protected $table = 'protocolo_fotos';
   // protected $connection = 'chatpovo';

    protected $hidden = ['serial', 'key']; // esconde do JSON/API
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'serial', 'protocolo_id', 'foto'
    ];


    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->key = (string) Str::uuid();
        });
    }

    public function getFotoUrlAttribute()
    {
        return url('storage/' . $this->foto);
    }

}
