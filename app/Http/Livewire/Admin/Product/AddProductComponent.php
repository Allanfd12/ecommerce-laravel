<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;


class AddProductComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.add-product-component',
        [
            'categories' => $categories
        ]
        )->layout('layouts.padrao');
        
    }
}
