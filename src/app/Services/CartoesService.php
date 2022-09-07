<?php

namespace App\Services;

use App\Models\Cartao;

class CartoesService
{
    public function buscaCartoes($withTrashed = false)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
    }
}
