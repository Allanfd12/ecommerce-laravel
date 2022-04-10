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

    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $produto = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit($this->totalPopularProductsPerPage)->get();
        $related_products = Product::where('category_id',$produto->category_id)->inRandomOrder()->limit($this->totalRelatedProducts)->get();
        return view('livewire.product-component',
        [
            'product'=>$produto,
            'popular_products'=>$popular_products,
            'related_products'=>$related_products
        ])->layout('layouts.padrao');

    }
}
