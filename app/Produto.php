<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function exibirValorFormatado()
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
}
