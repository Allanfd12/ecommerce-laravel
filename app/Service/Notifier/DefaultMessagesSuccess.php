<?php
namespace App\Service\Notifier;

enum DefaultMessagesSuccess:String
{
    //@ANCHOR carrinho
    case CartProductAdd = 'Produto adicionado ao carrinho!';
    case CartProductRemoved = 'Produto removido!';
    case CartClear = 'Carrinho limpo!';

    //@ANCHOR Categoria
    case CategoryAdd = 'Categoria adicionada!';
    case CategoryEdited = 'Categoria editada!';
    case CategoryDeleted = 'Categoria removida!';

}

