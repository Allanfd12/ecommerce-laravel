<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    // guarda o numero de casas decimais
    private $numberDecimalCases = 2;
    // guarda o simbolo padrao para o valor monetario
    private $defaultMonetaryUnit = 'R$';

    public function showFormattedPrice()
    {
        $price = $this->regular_price;
        if($this->sale_price != null) {
            $price = $this->sale_price;
        }
        return $this->defaultMonetaryUnit.' '. number_format($price, $this->numberDecimalCases, ',', '.');
    }
    //TODO: obter imagem do banco de dados
}
