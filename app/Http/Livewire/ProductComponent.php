<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Product;

class ProductComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.product-component',['product'=>Product::where('slug',$this->slug)->first()])->layout('layouts.padrao');

    }
}
