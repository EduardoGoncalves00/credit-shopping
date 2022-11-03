<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $guarded = [];

    protected $dates = ['data'];

    /*
        o metodo faz com que o categoria_id da tabela de compras, faça pertencer ao id de categoria, ate mesmo com as categorias apagadas
    */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id')->withTrashed();
    }

    /*
        o metodo faz com que o cartao_id da tabela de compras, faça pertencer ao id de cartao, ate mesmo com os cartoes apagados
    */
    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartao_id', 'id')->withTrashed();
    }
}
