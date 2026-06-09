<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    protected $fillable = [
        'codigo_pallet', 'peso_carga', 'altura', 'largura', 'profundidade', 'status', 
    ];
}
