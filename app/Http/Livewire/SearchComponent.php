<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;
use \App\Models\Category;
use App\Service\Cart\CartService;
use App\Service\Formater\FormaterService;
use App\Service\Notifier\ViewNotifierService;
use App\Service\Notifier\DefaultMessagesSuccess;
use \App\Repository\interfaces\IProductRepository;

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
     * @var string
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
     * @var int
     */
    public $category_id = null;  

    /**
     * category - guarda o titulo da categoria selecionada
     *
     * @var string
     */
    public $category = 'All Category';

      /**
     * formater - Classe de formatação
     *
     * @var undefined
     */
    public $formater = FormaterService::class;  
    
    private IProductRepository $productRepository;

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
        $this->productRepository = app()->make(IProductRepository::class);

        $search = $this->productRepository->SearchProducts($this->search, $this->category_id);
        $products = $this->productRepository->getSortedProducts($this->sort_method,$search)
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
        CartService::add(Product::find($product_id),$quantity);
        
        ViewNotifierService::success(DefaultMessagesSuccess::CartProductAdd);
        return redirect()->route('cart');
    }
}
