<?php

require_once ("funcoes.php");

$conta = [
    "cpf" => "123.456.789-10",
    "titular" => "Cleef Souza",
    "saldo" => 5000

];

// execução

exibir($conta);

$conta = sacar(5000, $conta);
exibir($conta);

$conta = sacar(1000, $conta);
exibir($conta);

$conta = depositar(2.50, $conta);
exibir($conta);