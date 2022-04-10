<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Product;

class ShopComponent extends Component
{
    // indica a quantidade maxima de produtos por pagina
    private $productsPerPage = 10;

    use WithPagination;
    public function render()
    {
        
        $products = Product::paginate($this->productsPerPage);
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.padrao');
    }
}
