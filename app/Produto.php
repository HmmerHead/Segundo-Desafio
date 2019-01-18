<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['sku', 'nome', 'valorUnitario', 'UnidadeVenda', 'created_at', 'updated_at'];
}
