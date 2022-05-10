<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use illuminate\Support\Str;
use App\Service\Notifier\ViewNotifierService;
use App\Service\Notifier\DefaultMessagesSuccess;

class EditCategoryComponent extends Component
{

    /**
     * name - nome da categoria
     *
     * @var string
     */
    public $name;    
    /**
     * slug - slug original da categoria
     *
     * @var string
     */
    public $slug;
    /**
     * new_slug - novo slug da categoria
     *
     * @var string
     */
    public $new_slug;
    /**
     * cat_id - id da categoria
     *
     * @var int
     */
    public $cat_id;
    
    public function mount($slug){
        $category = Category::where('slug', $slug)->first();
        $this->name = $category->name;
        $this->new_slug = $category->slug;
        $this->cat_id = $category->id;
    }

    public function render()
    {
        return view('livewire.admin.category.edit-category-component')->layout('layouts.padrao');
    }

    public function update(){
        $category = Category::find($this->cat_id);
        $category->name = $this->name;
        $category->slug = $this->new_slug;
        $category->save();
        ViewNotifierService::success(DefaultMessagesSuccess::CategoryEdited);
    }

    /**
     * generateSlug - gera o slug da categoria
     *
     * @return void
     */
    public function generateSlug()
    {
        $this->new_slug = Str::slug($this->name);
    }
}
