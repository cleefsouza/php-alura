<?php

use Alura\MVC\Entity\Curso;
use Alura\MVC\Infrastructure\EntityManagerFactory;

require __DIR__ . "/../vendor/autoload.php";

$entityManager = (new EntityManagerFactory())->getEntityManager();
$cursoRepository = $entityManager->getRepository(Curso::class);
$cursos = $cursoRepository->findAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos Alura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron mt-3 mb-3">
        <h1 class="mb-0">Cadastrar cursos</h1>
    </div>

    <form action="">
        <div class="form-group">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome"/>
        </div>
        <button class="btn btn-success">Salvar</button>
    </form>
</div>
</body>
</html>
