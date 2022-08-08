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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartao_id', 'id');
    }

}
