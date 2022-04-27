<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Category;

class HeaderSearchComponet extends Component
{
    public $search;
    public $category = 'All Category';
    public $category_id = 0;

    public function mount()
    {
        $this->fill(request()->only('search','category','category_id'));

    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.header-search-componet',[
            'categories'=>$categories
        ]);
    }
}
