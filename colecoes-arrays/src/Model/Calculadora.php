<?php

namespace Alura\Model;

/**
 * Class Calculadora
 * @package Alura\Model
 */
class Calculadora
{
    /**
     * @param array $values
     * @return float|null
     */
    public function calcularMedia(array $values): ?float
    {
        $qtd = sizeof($values);

        if (!$qtd) return null;

        return array_reduce($values, function($ant, $val){
                return $ant += $val;
            }) / $qtd;
    }
}
