<?php

require __DIR__ . "/../vendor/autoload.php";

use Alura\MVC\Controller\CursoController;
use Alura\MVC\Controller\LoginController;

switch ($_SERVER["PATH_INFO"]) {
    case "/curso/listar":
        (new CursoController())->listar();
        break;
    case "/curso/adicionar":
        (new CursoController())->form();
        break;
    case "/curso/salvar":
        (new CursoController())->salvar();
        break;
    case "/curso/remover":
        (new CursoController())->remover();
        break;
    case "/curso/alterar":
        (new CursoController())->alterar();
    case "/login":
        (new LoginController())->form();
        break;
    default:
        require __DIR__ . "/../view/erro404.php";
        break;
}
