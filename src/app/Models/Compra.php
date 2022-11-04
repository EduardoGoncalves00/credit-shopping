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
        o metodo retorna o model da categoria com base no campo categoria_id tabela de compras, 
        ate mesmo se a categoria estiver apagada

        belongsTo = pertence a
        exemplo: uma compra possui uma categoria
    */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id')->withTrashed();
    }

    /*
        o metodo retorna a model cartao com base no campo cartao_id da tabela de compra,
        ate mesmo se o cartao for apagado
        
        belongsTo = pertence a
        exemplo: uma compra possui um cartao
    */
    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartao_id', 'id')->withTrashed();
    }
}
