<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use illuminate\Support\Str;

class AddCategoryComponent extends Component
{    
    /**
     * name - nome da categoria
     *
     * @var mixed
     */
    public $name;    
    /**
     * slug - slug da categoria
     *
     * @var mixed
     */
    public $slug;
    
    public function render()
    {
       
        return view('livewire.admin.category.add-category-component')->layout('layouts.padrao');
    }

    public function store(){
        if(Category::tryAddCategory($this->name, $this->slug)){
            session()->flash('success_message', 'Categoria adicionada com sucesso!');
        }else{
            session()->flash('error_message', 'Slug já existe, tente outro nome!');
        }
        
    }
    
    /**
     * generateSlug - gera o slug da categoria
     *
     * @return void
     */
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
}
