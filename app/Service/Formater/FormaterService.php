<?php
namespace App\Service\Formater;

class FormaterService {
    
    /**
     * numberDecimalCases - Define o numero de casas decimais
     *
     * @var int
     */
    private static $numberDecimalCases = 2;
    /**
     * defaultMonetaryUnit - Define o simbolo padrao para o valor monetario
     *
     * @var string
     */
    private static $defaultMonetaryUnit = 'R$';

    /**
     * monetaryValue - Formata o valor monetario formatado
     *
     * @param  mixed $value - valor monetario
     * @return void
     */
    public static function monetaryValue($value)
    {
        return self::$defaultMonetaryUnit . ' ' . number_format(floatval($value), self::$numberDecimalCases, ',', '.');
    }
}