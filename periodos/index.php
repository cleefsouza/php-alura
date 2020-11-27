<?php

$hoje = date("d/m/Y");
echo $hoje . PHP_EOL;

$agora = date("d/m/Y H:i");
echo $agora . PHP_EOL;

$agora = new DateTime(); // pega o momento atual
echo $agora->format("d/m/Y H:i") . PHP_EOL; // exibe no formato desejado

// variações
$agora = new DateTime("NOW");
print_r($agora);
$ontem = new DateTime("YESTERDAY");
print_r($ontem);
$dia15 = new DateTime("2020-12-15");
print_r($dia15);

// date formate
$formato = "d/m/Y";
$sdia15 = "15/03/2019";
$dia15 = DateTime::createFromFormat($formato, $sdia15);
print_r($dia15);

// intervalo
$entrada = new DateTime("09:00");
$saida = new DateTime("18:00");
$intervalo = $saida->diff($entrada);
print_r($intervalo);
echo $intervalo->h . PHP_EOL;

// timezone
$timezone = new DateTimeZone("America/Sao_Paulo");
$agora = new DateTime("NOW", $timezone);

$umDia = new DateInterval("P1D"); // intervalo de 1 dia
// com DateTime:
$hoje = new DateTime();
echo $hoje->format("d/m") . PHP_EOL;
$hoje->add($umDia); // altera o valor de $hoje
echo $hoje->format("d/m") . PHP_EOL;

// com DateTimeImmutable
$hoje = new DateTimeImmutable();
echo $hoje->format("d/m") . PHP_EOL;
$amanha = $hoje->add($umDia); // não altera o valor de $hoje
echo $hoje->format("d/m") . PHP_EOL;
echo $amanha->format("d/m") . PHP_EOL;

// ****************************************************** //

$ini = new DateTime("2022-11-21");
$int = new DateInterval("P4Y");
$per = new DatePeriod($ini, $int, 5);

// intervalo copa do mundo
foreach ($per as $date) {
    echo $date->format("d/m/Y") . PHP_EOL;
}
