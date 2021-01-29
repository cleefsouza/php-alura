<?php

use Alura\PSR\Infrastructure\EntityManagerFactory;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(
    [
        EntityManagerInterface::class => function () {
            return (new EntityManagerFactory())->getEntityManager();
        },
    ]
);

try {
    return $containerBuilder->build();
} catch (Exception $e) {
    print_r($e->getMessage());
}
