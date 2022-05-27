<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Product;
use App\Service\Cart\CartService;
use App\Service\Formater\FormaterService;
use App\Service\Notifier\ViewNotifierService;
use App\Service\Notifier\DefaultMessagesSuccess;
use \App\Repository\interfaces\IProductRepository;

class ProductComponent extends Component
{

    /**
     * totalPopularProductsPerPage - indica a quantidade maxima de produtos populares por pagina
     *
     * @var int
     */
    private $totalPopularProductsPerPage =4;

    /**
     * totalRelatedProducts - indica a quantidade maxima de produtos relacionados por pagina
     *
     * @var int
     */
    private $totalRelatedProducts =4;
    
    /**
     * formater - Classe de formatação
     *
     * @var undefined
     */
    public $formater = FormaterService::class;

    /**
     * product - guarda o produto selecionado
     * 
     * @var \App\Models\Product
     */
    public $product;
    
    /**
     * slug - guarda o slug do produto
     *
     * @var mixed
     */
    public $slug;
    
    private IProductRepository $productRepository;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug',$this->slug)->first();
    }

    public function render()
    {
        
        $this->productRepository = app()->make(IProductRepository::class);
        
        $popular_products = Product::inRandomOrder()->limit($this->totalPopularProductsPerPage)->get();
        $related_products = Product::where('category_id',$this->product->category_id)->inRandomOrder()->limit($this->totalRelatedProducts)->get();
        return view('livewire.product-component',
        [
            'product'=>$this->product,
            'popular_products'=>$popular_products,
            'related_products'=>$related_products
        ])->layout('layouts.padrao');

    }    
    /**
     * store - Adiciona o produto selecionado ao carrinho
     *
     * @param  mixed $quantity
     * @return void
     */
    public function store( $quantity = 1)
    {
        CartService::add($this->product,$quantity);

        ViewNotifierService::success(DefaultMessagesSuccess::CartProductAdd);
        return redirect()->route('cart');
    }
}
