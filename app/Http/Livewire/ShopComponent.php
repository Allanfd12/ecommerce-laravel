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
     * @var string
     */
    public $sort_method =  'default';

    /**
     * formater - Classe de formatação
     *
     * @var undefined
     */
    public $formater = FormaterService::class;

    private IProductRepository $productRepository;
    
    use WithPagination;
    public function render()
    {
        $this->productRepository = app()->make(IProductRepository::class);
        $products = $this->productRepository->getSortedProducts($this->sort_method)->paginate($this->productsPerPage);

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
        CartService::add(Product::find($product_id),$quantity);

        ViewNotifierService::success(DefaultMessagesSuccess::CartProductAdd);
        return redirect()->route('cart');
    }
}
