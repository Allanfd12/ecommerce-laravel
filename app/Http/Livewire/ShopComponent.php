<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;
use \App\Models\Category;

class ShopComponent extends Component
{
    // indica a quantidade maxima de produtos por pagina
    public $productsPerPage = 10;

    // guarda o tipo de ordenacao dos produtos
    public $sort_method =  'default';

    use WithPagination;
    public function render()
    {
        
        $products = Product::getSortedProducts($this->sort_method)->paginate($this->productsPerPage);

        $categories = Category::all();
        return view('livewire.shop-component',[
            'products'=>$products,
            'categories'=>$categories
        ])->layout('layouts.padrao');
    }

    public function store($product_id, $quantity = 1)
    {
        $product = Product::find($product_id);
        $product->addToCart($quantity);
        session()->flash('success_message', 'Produto adicionado ao carrinho com sucesso!');
        return redirect()->route('cart');
    }
}
