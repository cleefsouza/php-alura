<?php

require __DIR__ . "/../vendor/autoload.php";

use Alura\PSR\Controller\FormInsercaoController;
use Alura\PSR\Controller\RequestControllerInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

$path = $_SERVER["PATH_INFO"];
$rotas = require_once __DIR__ . "/../config/routes.php";

if (!array_key_exists($path, $rotas)) {
//    require __DIR__ . "/../view/erro404.php";
    die;
}

session_start();
//$isLogin = stripos($path, "login");
//
//if (!isset($_SESSION["user"]) && $isLogin === false) {
//    header("Location: /login", true, 302);
//    die;
//}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();

/** @var FormInsercaoController $controller */
$controller = new FormInsercaoController();
$response = $controller->processarRequest($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
