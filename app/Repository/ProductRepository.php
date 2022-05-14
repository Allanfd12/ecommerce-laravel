<?php

namespace App\Repository;

use App\Models\Product;
use App\Repository\interfaces\IProductRepository;

class ProductRepository implements IProductRepository{

    /**
     * getSortedProducts - Obtem os produtos ordenados por data ou preco
     * @param string $sort_method Tipo de ordenacao
     * @param \Illuminate\Database\Eloquent\Builder $query Query de produto a ser ordenada
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getSortedProducts(string $method, \Illuminate\Database\Eloquent\Builder $query = null) : \Illuminate\Database\Eloquent\Builder{
        if($query == null){
            $query = Product::query();
        }
        switch($method){
            case 'date':
               $query->orderBy('created_at', 'desc');
                break;
            case 'price':
               $query->orderBy('sale_price', 'asc')->orderBy('regular_price', 'asc');
                break;
            case 'price-desc':
               $query->orderBy('sale_price', 'desc')->orderBy('regular_price', 'desc');
                break;
            case 'default':  
            default:
               $query->orderBy('id', 'desc');
                break;
        }
        return $query;
    }
    
    /**
     * SearchProducts Retorna uma lista de produstos pesquisados por categoria e termo de busca
     * @param string $search termo de busca
     * @param int $category_slug id da categoria
     * @param \Illuminate\Database\Eloquent\Builder $query Query de produto a ser pesquisada
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function SearchProducts(string $search, int $category_id, \Illuminate\Database\Eloquent\Builder $query = null) : \Illuminate\Database\Eloquent\Builder{
        if($query == null){
            $query = Product::query();
        }
        $query->where('name', 'like', '%'.$search.'%');
        if($category_id != 0){
            $query->where('category_id', $category_id);
        }
        return $query;
    }
}