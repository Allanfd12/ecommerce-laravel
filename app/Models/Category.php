<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public static function tryAddCategory($name, $slug)
    {
        if(!self::categoryExists($slug)){
            $category = new Category();
            $category->name = $name;
            $category->slug = $slug;
            $category->save();
            return true;
        }
        return false;
    }
    
    public static function categoryExists($slug)
    {
        return Category::where('slug', $slug)->exists();
    }
}
