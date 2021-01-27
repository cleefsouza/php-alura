<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos Alura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<?php if (isset($_SESSION["user"])): ?>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/curso/listar">Home</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/logout">Sair</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>
<div class="container">
    <div class="jumbotron mt-3 mb-3">
        <h1 class="mb-0"><?= $titulo; ?></h1>
    </div>

    <?php if (isset($_SESSION["msg"])): ?>
        <div class="mb-3 alert alert-<?= $_SESSION["tipo_msg"]; ?>">
            <?= $_SESSION["msg"]; ?>
        </div>
        <?php
        unset($_SESSION["msg"]);
        unset($_SESSION["tipo_msg"]);
        ?>
    <?php endif; ?>
