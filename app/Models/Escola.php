<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cie',
        'regiao',
        'bairro',
        'endereco',
        'observacao',
        'telefone',
        'email',
        'tipo_ensino',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'escola_id');
    }
}
