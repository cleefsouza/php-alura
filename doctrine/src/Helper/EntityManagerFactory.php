<?php

declare(strict_types=1);

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\{EntityManager, EntityManagerInterface, ORMException};
use Doctrine\ORM\Tools\Setup;

/**
 * Class EntityManagerFactory
 * @package Alura\Doctrine\Helper
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
        $config = Setup::createAnnotationMetadataConfiguration([$path . "/src"], true);
        $conexao = ["driver" => "pdo_sqlite", "path" => $path . "/var/data/db.sqlite"];

        return EntityManager::create($conexao, $config);
    }
}
