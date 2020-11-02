<?php

$contas = [
    "123.456.789-10" => [
        "titular" => "Cleef Souza",
        "saldo" => 5000
    ],
    "109.876.543-21" => [
        "titular" => "Maria João",
        "saldo" => 2000
    ],
    "147.852.369-01" => [
        "titular" => "Pedro Monteiro",
        "saldo" => 1800
    ]
];

foreach ($contas as $cpf => $conta) {
    echo "CPF: $cpf\nTitular: {$conta["titular"]}\nSaldo: {$conta["saldo"]}" . PHP_EOL;
    echo "------------------------" . PHP_EOL;
}