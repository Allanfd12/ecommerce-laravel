<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use illuminate\Support\Str;
use App\Service\Notifier\ViewNotifierService;
use App\Service\Notifier\DefaultMessagesError;
use App\Service\Notifier\DefaultMessagesSuccess;

class AddCategoryComponent extends Component
{    
    /**
     * name - nome da categoria
     *
     * @var string
     */
    public $name;    
    /**
     * slug - slug da categoria
     *
     * @var string
     */
    public $slug;
    
    public function render()
    {
       
        return view('livewire.admin.category.add-category-component')->layout('layouts.padrao');
    }

    public function store(){
        if(Category::tryAddCategory($this->name, $this->slug)){
            ViewNotifierService::success(DefaultMessagesSuccess::CategoryAdd);
        }else{
            ViewNotifierService::error(DefaultMessagesError::SlugNotUnique);
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
