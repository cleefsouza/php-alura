<?php

require_once "autoload.php";

use Alura\Model\{Calculadora, ArrayUtils};

$notas = [9, 3, 10, 5, 10];
$media = Calculadora::calcularMedia($notas);

echo $media
    ? "A média das notas foi {$media}" . PHP_EOL
    : "Não foi possivel calcular a média" . PHP_EOL;

$saldos = [2550, 3000, 4400, 1000, 8700, 9000];
sort($saldos);

array_map(
    function ($saldo) {
        echo "Saldo: {$saldo}" . PHP_EOL;
    },
    $saldos
);

$nomes = "Giovanni, João, Maria, Pedro";

$nomesArray = explode(", ", $nomes);
print_r($nomesArray);

natsort($nomesArray); // natural order
$nomesString = implode(" - ", $nomesArray);

echo $nomesString . PHP_EOL;

$aleatorio = [1, 2, 3, "João", "Marcos", 50, "Maria", "50"];

ArrayUtils::delElemento(50, $aleatorio);
print_r($aleatorio);
