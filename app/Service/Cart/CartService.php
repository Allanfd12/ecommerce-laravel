<?php
namespace App\Service\Cart;

use Cart;
use App\Models\Product;

class CartService extends Cart{
    
    /**
     * Add - adiciona um novo produto ao carrinho
     *
     * @param  App\Models\Product $product
     * @param  int $quantity
     * @return void
     */
    public static function add(Product $product ,$quantity = 1){
        Cart::add($product->id, $product->name, $quantity, $product->getPrice())->associate('App\Models\Product');
    }
    
    /**
     * changeQuantity - aumenta ou diminui a quantidade de produtos
     *
     * @param  mixed $rowId
     * @param  mixed $quantity
     * @return void
     */
    public static function changeQuantity($rowId, $quantity = 1 ){
        $product = Cart::get($rowId);
        $qty = $product->qty + $quantity;
        Cart::update($rowId, $qty);
    }
}