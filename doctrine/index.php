<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/vendor/autoload.php";

$factory = new EntityManagerFactory();
$manager = $factory->getEntityManager();
$alunoRepository = $manager->getRepository(Aluno::class);

echo implode(", ", array_map(fn(Aluno $aluno) => $aluno->getNome(), $alunoRepository->findAll())) . PHP_EOL;
