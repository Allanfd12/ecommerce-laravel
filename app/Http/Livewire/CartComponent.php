<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    // guarda o numero de casas decimais
    private $numberDecimalCases = 2;
    // guarda o simbolo padrao para o valor monetario
    private $defaultMonetaryUnit = 'R$';

    public function render()
    {
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $total = Cart::total();

        return view(
            'livewire.cart-component',
            [
                'cart' => $cart,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total
            ]
        )->layout('layouts.padrao');
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message', 'Produto removido do carrinho!');
    }

    public function clearCart(){
        Cart::destroy();
        session()->flash('success_message', 'Carrinho limpo!');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }
    public function formatValue($value)
    {
        
        return $this->defaultMonetaryUnit . ' ' . number_format(floatval($value), $this->numberDecimalCases, ',', '.');
    }
}
