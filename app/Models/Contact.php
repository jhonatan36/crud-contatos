<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'user_id',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'localidade',
        'bairro',
        'estado',
    ];
}
