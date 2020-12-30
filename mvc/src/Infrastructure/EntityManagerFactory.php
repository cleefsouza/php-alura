<?php

declare(strict_types=1);

namespace Alura\MVC\Infrastructure;

use Doctrine\ORM\{EntityManager, EntityManagerInterface, ORMException};
use Doctrine\ORM\Tools\Setup;

/**
 * Class EntityManagerCreator
 * @package Alura\MVC\Infrastructure
 */
class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $path = __DIR__ . "/../..";
        $config = Setup::createAnnotationMetadataConfiguration([$path . "/src"], false);
        $conexao = ["driver" => "pdo_sqlite", "path" => $path . "/var/data/db.sqlite"];

        return EntityManager::create($conexao, $config);
    }
}
