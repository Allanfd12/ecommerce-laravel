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

class CategoryComponent extends Component
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
     * category - guarda a categoria selecionada
     *
     * @var \App\Models\Category
     */
    public $category;
    
    /**
     * slug - guarda o slug da categoria
     *
     * @var string
     */
    public $slug;

        /**
     * formater - Classe de formatação
     *
     * @var undefined
     */
    public $formater = FormaterService::class;

    private IProductRepository $productRepository;

    public function mount($slug)
    {

        $this->slug = $slug;
        $this->category = Category::where('slug',$this->slug)->first();

    }

    use WithPagination;
    public function render()
    {
        $this->productRepository = app()->make(IProductRepository::class);

        $products =  $this->productRepository->getSortedProducts($this->sort_method)->where('category_id',$this->category->id)->paginate($this->productsPerPage);

        $categories = Category::all();

        $categoryName = $this->category->name;

        return view('livewire.Category-component',[
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryName
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
        CartService::add(Product::find($product_id),$quantity);

        ViewNotifierService::success(DefaultMessagesSuccess::CartProductAdd);

        return redirect()->route('cart');
    }
}
