<?php

use Alura\PDO\Domain\Model\{Aluno, Telefone};
use Alura\PDO\Infrastructure\Repository\{AlunoRepository, TelefoneRepository};
use Alura\PDO\Infrastructure\Persistence\Connection;

require_once "vendor/autoload.php";

//Connection::deleteAll("aluno");
//Connection::deleteAll("telefone");

$alunoRepository = new AlunoRepository();
$telefoneRepository = new TelefoneRepository();

$aluno = new Aluno(null, "Cleef Souza", new DateTime("1995-07-03"));
$telefone = new Telefone(null, "083", "987453214");

$alunoRepository->salvar($aluno);
$telefone = $telefoneRepository->salvar($telefone, $aluno->getId());

$aluno->addTelefone($telefone);

array_map(fn($aluno) => print_r($aluno), $alunoRepository->listar());

