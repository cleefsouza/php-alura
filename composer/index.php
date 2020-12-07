#!/usr/bin/env php
<?php

require "vendor/autoload.php";

use Alura\Composer\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$lang = "php";
$base_uri = "https://www.alura.com.br/";

$crawler = new Crawler();
$client = new Client(["base_uri" => $base_uri]);
$buscador = new Buscador($client, $crawler);

$cursos = $buscador->buscar("cursos-online-programacao/{$lang}");

foreach ($cursos as $cur) {
    echo $cur . PHP_EOL;
}
