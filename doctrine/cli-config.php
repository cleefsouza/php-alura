<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . "/vendor/autoload.php";

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
