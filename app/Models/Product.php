<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    // guarda o numero de casas decimais
    private $numberDecimalCases = 2;
    // guarda o simbolo padrao para o valor monetario
    private $defaultMonetaryUnit = 'R$';

    /**
     * Retorna o valor monetario formatado
     *
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->defaultMonetaryUnit.' '. number_format($this->getPrice(), $this->numberDecimalCases, ',', '.');
    }

    /**
     * Retorna o valor monetario sem formatacao
     * 
     * @return float
     */
    public function getPrice(){
        $price = $this->regular_price;
        if($this->sale_price != null) {
            $price = $this->sale_price;
        }
        return $price;
    }

    /**
     * Adiciona um poduto ao carrinho
     * @param $quantity Quantidade a ser adicionada
     * @return void
     */
    public function addToCart($quantity = 1)
    {
        Cart::add($this->id, $this->name, $quantity, $this->getPrice())->associate('App\Models\Product');
    }
    //TODO: obter imagem do banco de dados
}
