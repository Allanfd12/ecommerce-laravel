<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    /**
     * Retorna o valor monetario sem formatacao
     * 
     * @return float
     */
    public function getPrice() : float {
        $price = $this->regular_price;
        if($this->sale_price != null) {
            $price = $this->sale_price;
        }
        return $price;
    }

    /**
     * getImage - Retorna o valor monetario sem formatacao
     */
    public function getImage(){
        //TODO: obter imagem do banco de dados

        return $this->image;
    }

    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }

}
