<?php

namespace App\Http\Livewire\Service;

use Livewire\Component;
use \App\Models\Category;

class HeaderSearchComponet extends Component
{    
    /**
     * search - guarda o valor da busca
     *
     * @var string
     */
    public $search;    
    /**
     * category - guarda o titulo da categoria selecionada
     *
     * @var string
     */
    public $category = 'All Category';    
    /**
     * category_slug - guarda o slug da categoria selecionada
     *
     * @var string
     */
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

        return view('livewire.service.header-search-componet',[
            'categories'=>$categories
        ]);
    }
}
