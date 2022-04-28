<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Models\Category;

class AdminCategoryComponent extends Component
{

    // indica a quantidade maxima de itens por pagina
    public $itensPerPage = 4;

    use WithPagination;
    public function render()
    {

        $categories = Category::paginate($this->itensPerPage);
        return view('livewire.admin.admin-category-component',
        [
            'categories'=>$categories
        ]
        )->layout('layouts.padrao');
    }
}
