<?php

require __DIR__ . "/../vendor/autoload.php";

use Alura\MVC\Controller\ControladorRequisicaoInterface;

$path = $_SERVER["PATH_INFO"];
$rotas = require_once __DIR__ . "/../config/routes.php";

if (!array_key_exists($path, $rotas)) {
    require __DIR__ . "/../view/erro404.php";
    die;
}

session_start();
$isLogin = stripos($path, "login");

if (!isset($_SESSION["user"]) && $isLogin === false) {
    header("Location: /login", true, 302);
    die;
}

$class = $rotas[$path];

/** @var ControladorRequisicaoInterface $controller */
$controller = new $class();
$controller->processarRequest($path);
