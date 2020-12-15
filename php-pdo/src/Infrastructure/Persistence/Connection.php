<?php

namespace Alura\PDO\Infrastructure\Persistence;

use PDO;

/**
 * Class Connection
 * @package Alura\PDO\Infrastructure\Persistence
 */
class Connection
{
    /**
     * @return PDO
     * Static Creation Method
     */
    public static function criarConexao(): PDO
    {
        $path = __DIR__ . "/../../../db.sqlite";
        return new PDO("sqlite:" . $path);
    }
}
