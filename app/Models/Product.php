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
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
}
