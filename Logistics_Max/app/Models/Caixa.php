<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $fillable = [
        'codigo_caixa', 'peso_carga', 'altura', 'largura', 'profundidade', 'status', 
    ];
}
