<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Lista dos campos do produto
* Obs.: o Campo UnidadeVenda possui opções
* ('Caixa', 'Unitário', 'Pacote', 'Saco')
*/

class Produto extends Model
{
    protected $fillable = ['sku', 'nome', 'valorUnitario', 'UnidadeVenda', 'created_at', 'updated_at'];
}
