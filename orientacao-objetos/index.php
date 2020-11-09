<?php

require_once "src/Conta.php";

$maria = new Conta(1, "123.456.789-10", "Maria", 100);
$pedro = new Conta(2, "109.876.543-21", "Pedro");

$maria->depositar(75);
$pedro->sacar(100);
$maria->transferir(75, $pedro);

echo $maria->__toString();
echo $pedro->__toString();
