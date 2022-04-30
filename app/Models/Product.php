<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    /**
     * numberDecimalCases - Define o numero de casas decimais
     *
     * @var int
     */
    private $numberDecimalCases = 2;
    
    /**
     * defaultMonetaryUnit - Define o simbolo padrao para o valor monetario
     *
     * @var string
     */
    private $defaultMonetaryUnit = 'R$';

    /**
     * Retorna o valor monetario formatado
     *
     * @return string
     */
    public function getFormattedPrice() : String {
        return $this->defaultMonetaryUnit.' '. number_format($this->getPrice(), $this->numberDecimalCases, ',', '.');
    }

    /**
     * Retorna o valor monetario sem formatacao
     * 
     * @return float
     */
    public function getPrice() : float {
        $price = $this->regular_price;
        if($this->sale_price != null) {
            $price = $this->sale_price;
        }
        return $price;
    }

    /**
     * getImage - Retorna o valor monetario sem formatacao
     */
    public function getImage(){
        //TODO: obter imagem do banco de dados

        return $this->image;
    }

    /**
     * addToCart - Adiciona um poduto ao carrinho
     * @param $quantity Quantidade a ser adicionada
     */
    public function addToCart($quantity = 1) : void
    {
        Cart::add($this->id, $this->name, $quantity, $this->getPrice())->associate('App\Models\Product');
    }

    /**
     * getSortedProducts - Obtem os produtos ordenados por data ou preco
     * @param string $sort_method Tipo de ordenacao
     * @param \Illuminate\Database\Eloquent\Builder $query Query de produto a ser ordenada
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getSortedProducts($sort_method,$query = null) : \Illuminate\Database\Eloquent\Builder
    {
        if($query == null){
            $query = Product::query();
        }
        switch($sort_method){
            case 'date':
                $products = $query->orderBy('created_at', 'desc');
                break;
            case 'price':
                $products = $query->orderBy('sale_price', 'asc')->orderBy('regular_price', 'asc');
                break;
            case 'price-desc':
                $products = $query->orderBy('sale_price', 'desc')->orderBy('regular_price', 'desc');
                break;
            case 'default':  
            default:
                $products = $query->orderBy('id', 'desc');
                break;
        }
        return $products;
    }
    /**
     * SearchProducts Retorna uma lista de produstos pesquisados por categoria e termo de busca
     * @param string $search termo de busca
     * @param int $category_slug id da categoria
     * @param \Illuminate\Database\Eloquent\Builder $query Query de produto a ser pesquisada
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function SearchProducts($search, $category_id,$query = null) : \Illuminate\Database\Eloquent\Builder
    {
        if($query == null){
            $query = Product::query();
        }
        $products = $query->where('name', 'like', '%'.$search.'%');
        if($category_id != null) {
    
            $products = $products->where('category_id', $category_id);
            
        }
        return $products;
    }
}
