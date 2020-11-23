<?php

require_once "autoload.php";

use Alura\Model\Calculadora;

$calc = new Calculadora();

$notas = [9, 3, 10, 5, 10];

echo "A média das notas foi {$calc->calcularMedia($notas)}" . PHP_EOL;
