<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function showFormattedPrice()
    {
        if($this->sale_price != null) {
            return 'R$ ' . number_format($this->sale_price, 2, ',', '.');   
        }
        return 'R$ ' . number_format($this->regular_price, 2, ',', '.');
    }
}
