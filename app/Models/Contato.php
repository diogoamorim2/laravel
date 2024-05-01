<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone_fixo',
        'telefone_celular',
        'empresa_nome',
        'empresa_contato',
        'comentario'
    ];
}
