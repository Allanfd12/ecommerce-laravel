<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Category;

class HeaderSearchComponet extends Component
{
    public $search;
    public $category = 'All Category';
    public $category_slug = null;

    public function mount()
    {
        $this->fill(request()->only('search','category_slug'));

        $category = Category::where('slug', $this->category_slug)->first();
        if($category != null){
            $this->category = $category->name;
        }
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.header-search-componet',[
            'categories'=>$categories
        ]);
    }
}
