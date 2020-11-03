<?php

$nomes = array("João", "Maria", "Carlos", "Pedro", "Luana", "Lais");
$idades = [21, 25, 30, 48, 60, 16, 12, 19, 80];

[$joao, $maria, $carlos] = $idades;
var_dump($joao, $maria, $carlos);

for ($i = 0; $i < count($idades); $i++) {
    echo $idades[$i] . PHP_EOL;
}