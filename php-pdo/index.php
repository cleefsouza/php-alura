<?php

use Alura\PDO\Domain\Model\Aluno;
use Alura\PDO\Infrastructure\Repository\AlunoRepository;

require_once "vendor/autoload.php";

$alunoRepository = new AlunoRepository();
$aluno = new Aluno(null, "Cleef Souza", new DateTime("1995-07-03"));

$alunoRepository->salvar($aluno);

array_map(
    function ($aluno) {
        print_r($aluno);
    },
    $alunoRepository->listar()
);

