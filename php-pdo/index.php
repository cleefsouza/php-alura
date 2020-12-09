<?php

use Alura\PDO\Domain\Model\Aluno;

require_once "vendor/autoload.php";

$path = __DIR__ . "/db.sqlite";
$pdo = new PDO("sqlite:" . $path);

$aluno = new Aluno(null, "Cleef Souza", new DateTime("1995-07-03"));
print_r($aluno);

$insert = "INSERT INTO aluno (nome, nascimento) VALUES ('{$aluno->getNome()}', '{$aluno->getNascimento()->format("Y-m-d")}')";
print_r($insert . PHP_EOL);
$pdo->exec($insert);

$stm = $pdo->query("SELECT * FROM aluno;");
$resul = $stm->fetchAll(PDO::FETCH_ASSOC);

print_r($resul);
