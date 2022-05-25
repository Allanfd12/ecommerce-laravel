<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use \App\Models\Product;
use Livewire\WithPagination;

class ListProductComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(20);
        return view('livewire.admin.product.list-product-component',[
            'products'=>$products
            ])->layout('layouts.padrao');
    }
}
