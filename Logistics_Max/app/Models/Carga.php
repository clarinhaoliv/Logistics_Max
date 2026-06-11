<?php

namespace App\Models;

use App\Models\Pallet;
use App\Models\Caixa;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $fillable = [
        'id_caixa', 'id_pallet', 'destino', 'status', 'tipo_movimento', 'data_movimento', 'quantidade_movimento', 
    ];

    protected $casts = [
        'data_movimento' => 'date',
    ];

    public function caixas()
    {
        return $this->belongsTo(Caixa::class, 'id_caixa');
    }

    public function pallets()
    {
        return $this->belongsTo(Pallet::class, 'id_pallet');
    }
}
