<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\Cart\CartService;
use App\Service\Formater\FormaterService;

class CartComponent extends Component
{
    /**
     * formater - Classe de formatação
     *
     * @var undefined
     */
    public $formater = FormaterService::class;


    public function render()
    {
        $cart = CartService::content();
        $subtotal = CartService::subtotal();
        $tax = CartService::tax();
        $total = CartService::total();

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
        CartService::remove($rowId);
        session()->flash('success_message', 'Produto removido do carrinho!');
    }
    
    /**
     * clearCart - Limpa o carrinho
     *
     * @return void
     */
    public function clearCart(){
        CartService::destroy();
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
        CartService::changeQuantity($rowId,1);
    }    
    /**
     * decreaseQuantity - Diminui a quantidade, em 1, de um item do carrinho
     *
     * @param  int $rowId - id da linha do carrinho
     * @return void
     */
    public function decreaseQuantity($rowId)
    {
        CartService::changeQuantity($rowId,-1);
    }    

}
