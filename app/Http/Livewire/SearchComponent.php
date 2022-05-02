<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;
use \App\Models\Category;

class SearchComponent extends Component
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
    
    /**
     * search - guarda o valor da busca
     *
     * @var mixed
     */
    public $search;    

    /**
     * category_slug - guarda o slug da categoria selecionada
     *
     * @var mixed
     */
    public $category_slug;   

    /**
     * category_id - guarda o id da categoria selecionada
     *
     * @var undefined
     */
    public $category_id = null;  

    /**
     * category - guarda o titulo da categoria selecionada
     *
     * @var string
     */
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
    
    /**
     * store - adiciona um novo produto ao carrinho
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
