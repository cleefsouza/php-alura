<?php

switch ($_SERVER["PATH_INFO"]) {
    case "/curso/listar":
        require "listar-cursos.php";
        break;
    case "/curso/adicionar":
        require "adicionar-curso.php";
        break;
    default:
        echo "<h1>Página não encontrada: 404</h1>";
        break;
}
