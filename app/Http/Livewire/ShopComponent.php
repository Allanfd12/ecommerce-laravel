<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;

class ShopComponent extends Component
{
    // indica a quantidade maxima de produtos por pagina
    public $productsPerPage = 10;

    // guarda o tipo de ordenacao dos produtos
    public $sorting =  'default';

    use WithPagination;
    public function render()
    {
        switch($this->sorting){
            case 'date':
                $products = Product::orderBy('created_at', 'desc')->paginate($this->productsPerPage);
                break;
            case 'price':
                $products = Product::orderBy('sale_price', 'asc')->orderBy('regular_price', 'asc')->paginate($this->productsPerPage);
                break;
            case 'price-desc':
                $products = Product::orderBy('sale_price', 'desc')->orderBy('regular_price', 'desc')->paginate($this->productsPerPage);
                break;
            case 'default':  
            default:
                $products = Product::paginate($this->productsPerPage);
                break;
        }
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.padrao');
    }

    public function store($product_id, $quantity = 1)
    {
        $product = Product::find($product_id);
        $product->addToCart($quantity);
        session()->flash('success_message', 'Produto adicionado ao carrinho com sucesso!');
        return redirect()->route('cart');
    }
}
