<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'fornecedores_id', 'nome', 'preco', 'quantidade', 'codigo_produto', 
    ];

    public function fornecedores()
    {
        return $this->belongsTo(Fornecedores::class, 'fornecedores_id');
    }
}
