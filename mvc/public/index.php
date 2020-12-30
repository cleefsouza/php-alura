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
    <div class="jumbotron mt-5">
        <h1>Listar cursos</h1>
    </div>
    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item">
                <?= $curso->getNome(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
