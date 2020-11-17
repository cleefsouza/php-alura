<?php

require_once "src/Conta.php";
require_once "src/Titular.php";

$maria = new Titular("123.456.789-10", "Maria");
$pedro = new Titular("109.876.543-21", "Pedro");

$mariaConta = new Conta($maria, 77851, 100);
$pedroConta = new Conta($pedro, 65109);

$mariaConta->depositar(75);
$pedroConta->sacar(100);
$mariaConta->transferir(75, $pedroConta);

echo $mariaConta->__toString();
echo $pedroConta->__toString();
