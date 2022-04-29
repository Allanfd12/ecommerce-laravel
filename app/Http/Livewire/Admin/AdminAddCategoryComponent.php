<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    
    public function render()
    {
       
        return view('livewire.admin.admin-add-category-component')->layout('layouts.padrao');
    }

    public function store(){
        if(Category::tryAddCategory($this->name, $this->slug)){
            session()->flash('success_message', 'Categoria adicionada com sucesso!');
        }else{
            session()->flash('error_message', 'Slug já existe, tente outro nome!');
        }
        
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
}
