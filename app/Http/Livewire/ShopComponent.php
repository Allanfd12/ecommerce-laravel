<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;
use \App\Models\Category;

class ShopComponent extends Component
{
    /**
     * productsPerPage - indica a quantidade maxima de produtos por pagina
     *
     * @var int
     */
    public $productsPerPage = 10;

    /**
     * sort_method - guarda o tipo de ordenacao dos produtos
     *
     * @var undefined
     */
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
    
    /**
     * store - adiciona um produto ao carrinho
     *
     * @param  int $product_id - id do produto
     * @param  int $quantity - quantidade do produto
     * @return void
     */
    public function store($product_id, $quantity = 1)
    {
        $product = Product::find($product_id);
        $product->addToCart($quantity);
        session()->flash('success_message', 'Produto adicionado ao carrinho com sucesso!');
        return redirect()->route('cart');
    }
}
