<?php

require_once "autoload.php";

use Alura\Model\{ContaCorrente, ContaPoupanca, Titular, Endereco, Desenvolvedor, Gestor};

$mariaEndereco = new Endereco("Santa Rita", "Tibiri 2", "S/N", "79A");
$pedroEndereco = new Endereco("João Pessoa", "Centro", "João Agripino", "12");

$maria = new Titular("Maria", "123.456.789-10", $mariaEndereco);
$pedro = new Titular("Pedro", "109.876.543-21", $pedroEndereco);

$mariaConta = new ContaCorrente($maria, 77851, 100);
$pedroConta = new ContaPoupanca($pedro, 65109);

$mariaConta->depositar(75);
$mariaConta->transferir(15, $pedroConta);
$mariaConta->sacar(25);
$pedroConta->sacar(3);

echo $mariaConta->__toString();
echo $pedroConta->__toString();

$dev = new Desenvolvedor(
    "Pedro",
    "109.876.543-21",
    $pedroEndereco,
    "Desenvolvedor",
    1800
);
$gestor = new Gestor(
    "Maria",
    "123.456.789-10",
    $mariaEndereco,
    "Gestor",
    3000
);

echo $dev->__toString();
echo $gestor->__toString();
