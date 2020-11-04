<?php

require_once("funcoes.php");

$contas = [
    "01-0" => [
        "cpf" => "123.456.789-10",
        "titular" => "Cleef Souza",
        "saldo" => 5000
    ],
    "02-0" => [
        "cpf" => "109.876.543-12",
        "titular" => "João Agripino",
        "saldo" => 600
    ]
];

// execução

exibir($contas["01-0"]);

$contas["01-0"] = sacar(5000, $contas["01-0"]);
exibir($contas["01-0"]);

$contas["02-0"] = sacar(1000, $contas["02-0"]);
exibir($contas["02-0"]);

$contas["02-0"] = depositar(2.50, $contas["02-0"]);
exibir($contas["02-0"]);

remover($contas, "01-0");
exibir($contas["01-0"] ?? null);