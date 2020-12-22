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

        $pdo = new PDO("sqlite:" . $path);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }

    /**
     * @param string $table
     */
    public static function deleteAll(string $table): void
    {
        $path = __DIR__ . "/../../../db.sqlite";

        $pdo = new PDO("sqlite:" . $path);
        $pdo->exec("DELETE FROM {$table}");
    }
}
