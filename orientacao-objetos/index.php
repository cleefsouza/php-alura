<?php

require_once "autoload.php";

use Alura\Model\{ContaCorrente, ContaPoupanca, Titular, Endereco, Desenvolvedor, Gestor};
use Alura\Service\{FuncionarioService, AutenticadorService};

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

echo $mariaConta;
echo $pedroConta;

$dev = new Desenvolvedor(
    "Pedro",
    "109.876.543-21",
    $pedroEndereco,
    "Desenvolvedor",
    "AUX12",
    1800
);
$gestor = new Gestor(
    "Maria",
    "123.456.789-10",
    $mariaEndereco,
    "Gestor",
    "AX789",
    3000
);

$service = new FuncionarioService();
$auth = new AutenticadorService();

echo $auth->logar($gestor, "AX789");
echo $auth->logar($dev, "AX789");

$service->subirNivel($dev);
$service->subirNivel($gestor);

echo $dev;
echo $gestor;
