<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'apoios',
    ];

    protected $casts = [
        'apoios' => 'array',
    ];

    public function scopePesquisa($query, $pesquisa)
    {
        if ($pesquisa === '') {
            return;
        }

        return $query
            ->orWhere('form.id', 'LIKE', "%{$pesquisa}%")
            ->orWhere('form.name', 'LIKE', "%{$pesquisa}%")
            ->orWhere('form.address', 'LIKE', "%{$pesquisa}%");
    }

    // public function scopeEscola_id($query, $escola_id)
    // {
    //     if (!empty($escola_id)) {
    //         $query->where('escola_id', $escola_id);
    //     }

    //     return $query;
    // }
}
