<?php

use Alura\PDO\Domain\Model\Aluno;
use Alura\PDO\Infrastructure\Persistence\Connection;

require_once "vendor/autoload.php";

$pdo = Connection::criarConexao();

$aluno = new Aluno(null, "Cleef Souza", new DateTime("1995-07-03"));
print_r($aluno);

$insert = "INSERT INTO aluno (nome, nascimento) VALUES (:nome, :nascimento)";
print_r($insert . PHP_EOL);

$stm = $pdo->prepare($insert);
$stm->bindValue("nome", $aluno->getNome());
$stm->bindValue("nascimento", $aluno->getNascimento()->format("Y-m-d"));
$stm->execute();

$stm = $pdo->query("SELECT * FROM aluno;");
$resul = $stm->fetchAll(PDO::FETCH_ASSOC);

print_r($resul);

$delete = "DELETE FROM aluno WHERE id = ?";
$stm = $pdo->prepare($delete);
$stm->bindValue(1, 5, PDO::PARAM_INT);
$stm->execute();

print_r($resul);
