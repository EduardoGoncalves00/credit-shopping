<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cartoes';

    protected $guarded = [];

    public function melhorDia():string
    {
        $cartao = $this::select('dia_fechamento')->first();

        return Carbon::createFromFormat('d', $cartao->dia_fechamento)->addDays(1)->format('d');
    }

    public function fatura()
    {
        $mes = $this::select('data')->format('d');

        $ano = $this::select('data')->format('m');
    }

}
