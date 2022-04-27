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
    public $category_slug;
    public $category_id = null;
    public $category = 'All Category';


    public function mount(){
        $this->fill(request()->only('search','category_slug'));

        $category = Category::where('slug', $this->category_slug)->first();
        if($category != null){
            $this->category_id = $category->id;
            $this->category = $category->name;
        }
    }

    use WithPagination;
    public function render()
    {


        $products = Product::SearchProducts($this->search, $this->category_id);
        $products = Product::getSortedProducts($this->sort_method,$products)
                        ->paginate($this->productsPerPage);

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
