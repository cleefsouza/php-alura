<?php

use Alura\MVC\Controller\{CursoController, LoginController};

return [
    "/curso/listar" => CursoController::class,
    "/curso/adicionar" => CursoController::class,
    "/curso/salvar" => CursoController::class,
    "/curso/remover" => CursoController::class,
    "/curso/alterar" => CursoController::class,
    "/login" => LoginController::class,
    "/logout" => LoginController::class,
    "/login/validar" => LoginController::class,
];
