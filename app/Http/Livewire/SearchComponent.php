<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;
use \App\Models\Category;

class SearchComponent extends Component
{
    // indica a quantidade maxima de produtos por pagina
    public $productsPerPage = 10;

    // guarda o tipo de ordenacao dos produtos
    public $sort_method =  'default';

    public $search;
    public $category_id;
    public $category;


    public function mount(){
        $this->fill(request()->only('search','category_id','category'));
    }

    use WithPagination;
    public function render()
    {

        $products = Product::getSearchProducts($this->search, $this->category_id)->paginate($this->productsPerPage);
        //@TODO Implementar a ordenacao dos produtos        
        //->getSortedProducts($this->sort_method)
        $categories = Category::all();
        return view('livewire.search-component',[
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
