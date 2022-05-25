<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class AddProductComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.product.add-product-component')->extends('layouts.padrao');
    }
}
