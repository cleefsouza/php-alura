<?php

/**
 * nova sintaxe
 * arrow function
 * php 7.4
 */

$numeros = [1, 2, 3, 4, 5];
$multiplicador = 2;

$resultado = array_map(fn($item) => $item * $multiplicador, $numeros);

print_r($resultado);
