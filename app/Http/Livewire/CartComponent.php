<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    
    /**
     * numberDecimalCases - Define o numero de casas decimais
     *
     * @var int
     */
    private $numberDecimalCases = 2;
    /**
     * defaultMonetaryUnit - Define o simbolo padrao para o valor monetario
     *
     * @var string
     */
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
    /**
     * remove - Remove um item do carrinho
     *
     * @param  int $rowId - Id da linha do carrinho a ser removida
     * @return void
     */
    public function remove($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message', 'Produto removido do carrinho!');
    }
    
    /**
     * clearCart - Limpa o carrinho
     *
     * @return void
     */
    public function clearCart(){
        Cart::destroy();
        session()->flash('success_message', 'Carrinho limpo!');
    }
    
    /**
     * increaseQuantity - Aumenta a quantidade, em 1, de um item do carrinho
     *
     * @param  int $rowId - id da linha do carrinho
     * @return void
     */
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }    
    /**
     * decreaseQuantity - Diminui a quantidade, em 1, de um item do carrinho
     *
     * @param  int $rowId - id da linha do carrinho
     * @return void
     */
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }    
    /**
     * formatValue - Formata o valor monetario formatado
     *
     * @param  mixed $value - valor monetario
     * @return void
     */
    public function formatValue($value)
    {
        
        return $this->defaultMonetaryUnit . ' ' . number_format(floatval($value), $this->numberDecimalCases, ',', '.');
    }
}
