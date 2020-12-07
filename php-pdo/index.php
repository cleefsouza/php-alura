<?php

use Alura\PDO\Domain\Model\Estudante;

require_once "vendor/autoload.php";

$student = new Estudante(1, "Cleef Souza", new DateTime("1995-07-03"));

print_r($student);
