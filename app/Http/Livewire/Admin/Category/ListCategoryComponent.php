<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Category;

class ListCategoryComponent extends Component
{

    /**
     * itensPerPage - indica a quantidade maxima de itens por pagina 
     *
     * @var int
     */
    public $itensPerPage = 10;

    use WithPagination;
    public function render()
    {

        $categories = Category::paginate($this->itensPerPage);
        return view('livewire.admin.category.list-category-component',
        [
            'categories'=>$categories
        ]
        )->layout('layouts.padrao');
    }
}
