<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Product;

class ProductComponent extends Component
{
    // indica a quantidade maxima de produtos populars
    private $totalPopularProductsPerPage =4;
    // indica a quantidade maxima de produtos relacionados
    private $totalRelatedProducts =4;

    // armazena o produto selecionado
    /**
     * @var \App\Models\Product
     */
    public $product;

    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug',$this->slug)->first();
    }

    public function render()
    {
        $popular_products = Product::inRandomOrder()->limit($this->totalPopularProductsPerPage)->get();
        $related_products = Product::where('category_id',$this->product->category_id)->inRandomOrder()->limit($this->totalRelatedProducts)->get();
        return view('livewire.product-component',
        [
            'product'=>$this->product,
            'popular_products'=>$popular_products,
            'related_products'=>$related_products
        ])->layout('layouts.padrao');

    }
    public function store( $quantity = 1)
    {
        $this->product->addToCart($quantity);
        session()->flash('success_message', 'Produto adicionado ao carrinho!');
        return redirect()->route('cart');
    }
}
