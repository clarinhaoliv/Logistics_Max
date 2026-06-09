<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $fillable = [
        'destino', 'status', 'tipo_movimento', 'data_movimento', 'quantidade_movimento', 
    ];

    protected $casts = [
        'data_movimento' => 'date',
    ];
}
