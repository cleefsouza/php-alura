<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$lang = "php";
$cli = new Client();

$req = $cli
    ->request(
        "get",
        "https://www.alura.com.br/cursos-online-programacao/{$lang}"
    );

$cra = new Crawler();
$cra->addHtmlContent($req->getBody());
$cursos = $cra->filter("span.card-curso__nome");

foreach ($cursos as $cur) {
    echo $cur->textContent . PHP_EOL;
}
