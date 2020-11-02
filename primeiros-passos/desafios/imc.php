<?php

const
BAIXO = 18.5,
NORMAL = 24.9,
SOBREPESO = 29.9,
OBESIDADE = 34.9,
SEVEREA = 39.9,
MORBIDA = 40;

$alt = 1.78;
$pes = 82.3;

$res = $pes / ($alt ** 2);

if ($res < BAIXO) {
    echo "IMC: $res (Peso baixo).";
} elseif ($res >= BAIXO && $res <= NORMAL) {
    echo "IMC: $res (Peso normal).";
} elseif ($res > NORMAL && $res <= SOBREPESO) {
    echo "IMC: $res (Sobrepeso).";
} elseif ($res > SOBREPESO && $res <= OBESIDADE) {
    echo "IMC: $res (Obesidade grau 1).";
} elseif ($res > SEVEREA && $res < MORBIDA) {
    echo "IMC: $res (Obesidade severa).";
} else echo "IMC: $res (Obesidade mórbida).";