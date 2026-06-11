<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $fillable = [
        'codigo_caixa', 'peso_carga', 'unidade_peso', 'altura', 'largura', 'profundidade', 'status', 
    ];
}
