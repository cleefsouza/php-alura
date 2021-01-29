<?php

require __DIR__ . "/../vendor/autoload.php";

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

$path = $_SERVER["PATH_INFO"];
$rotas = require_once __DIR__ . "/../config/routes.php";

if (!array_key_exists($path, $rotas)) {
    http_response_code(404);
    die;
}

session_start();

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();

/** @var ContainerInterface $container */
$container = require_once __DIR__ . "/../config/dependencies.php";

/** @var RequestHandlerInterface $controller */
$controller = $container->get($rotas[$path]);

$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
