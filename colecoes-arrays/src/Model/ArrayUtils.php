<?php

declare(strict_types=1);

namespace Alura\Model;

/**
 * Class ArrayUtils
 * @package Alura\Model
 */
class ArrayUtils
{
    /**
     * @param $key
     * @param array $array
     */
    public static function delElemento($key, array &$array): void
    {
        $index = array_search($key, $array, true);

        if (!is_int($index)) {
            echo "{$key} não encontrado(a)" . PHP_EOL;

            return;
        }

        unset($array[$index]);
        echo "{$key} removido(a) com sucesso" . PHP_EOL;
    }
}
