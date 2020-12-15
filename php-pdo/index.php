<?php

use Alura\PDO\Domain\Model\Aluno;
use Alura\PDO\Infrastructure\Persistence\Connection;

require_once "vendor/autoload.php";

$pdo = Connection::criarConexao();

$aluno = new Aluno(null, "Cleef Souza", new DateTime("1995-07-03"));
