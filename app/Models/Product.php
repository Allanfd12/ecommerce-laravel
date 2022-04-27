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
     * Retorna o valor monetario sem formatacao
     * 
     * @return float
     */
    public function getImage(){
        //TODO: obter imagem do banco de dados

        return $this->image;
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

    /**
     * Obtem os produtos ordenados por data ou preco
     * @param string $sort_method Tipo de ordenacao
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getSortedProducts($sort_method)
    {
        switch($sort_method){
            case 'date':
                $products = Product::orderBy('created_at', 'desc');
                break;
            case 'price':
                $products = Product::orderBy('sale_price', 'asc')->orderBy('regular_price', 'asc');
                break;
            case 'price-desc':
                $products = Product::orderBy('sale_price', 'desc')->orderBy('regular_price', 'desc');
                break;
            case 'default':  
            default:
                $products = Product::orderBy('id', 'desc');
                break;
        }
        return $products;
    }
    /**
     * Retorna uma lista de produstos pesquisados por categoria e termo de busca
     * @param string $search termo de busca
     * @param int $category_id id da categoria
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getSearchProducts($search, $category_id)
    {
        $products = Product::where('name', 'like', '%'.$search.'%');
        if($category_id != 0) {
            $products = $products->where('category_id', $category_id);
        }
        return $products;
    }
}
