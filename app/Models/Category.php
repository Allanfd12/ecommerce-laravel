<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'slug'];

    /**
     * table - Define a tabela do banco de dados
     *
     * @var string
     */
    protected $table = 'categories';

            
    /**
     * tryAddCategory - Tenta adicionar uma categoria, retorna falso caso o slug já exista
     *
     * @param  string $name
     * @param  string $slug
     * @return bool true se adicionou, false se não
     */
    public static function tryAddCategory($name, $slug) : bool
    {
        if(self::categoryExists($slug)){
            return false;
        }

            $category = new Category();
            $category->name = $name;
            $category->slug = $slug;
            $category->save();
        
        return true;
    }
        
    /**
     * categoryExists - Verifica se uma categoria existe
     *
     * @param  string $slug
     * @return bool
     */
    public static function categoryExists($slug) : bool
    {
        return Category::where('slug', $slug)->exists();
    }
}
