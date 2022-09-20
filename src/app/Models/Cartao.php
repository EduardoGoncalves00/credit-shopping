<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartao extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = false;

    protected $table = 'cartoes';

    protected $guarded = [];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'cartao_id', 'id');
    }

    public function melhorDia():string
    {
        return Carbon::createFromFormat('d', $this->dia_fechamento)->addDays(1)->format('d');
    }

    public function itensFatura(string $dataFormulario)
    {
        $data = Carbon::createFromFormat('Y-m', $dataFormulario);
        $mesAtual = $data->format('Y-m');
        $mesAnterior = $data->subMonthsNoOverflow()->format('Y-m');
       
        $diaFechamento = $this->dia_fechamento;
        $melhorDia = $this->melhorDia();

        return $this->compras()->whereBetween('data', [$mesAnterior."-".$melhorDia, $mesAtual."-".$diaFechamento])->get();
    }

    public function totalFatura(string $dataFormulario)
    {
        $data = Carbon::createFromFormat('Y-m', $dataFormulario);
        $mesAtual = $data->format('Y-m');
        $mesAnterior = $data->subMonthsNoOverflow()->format('Y-m');
        $diaFechamento = $this->dia_fechamento;
        $melhorDia = $this->melhorDia();

        return $this->compras()->whereBetween('data', [$mesAnterior."-".$melhorDia, $mesAtual."-".$diaFechamento])->sum('valor'); // faz o sum direto no banco (+ performatico)
    }   
}
