<?php

declare(strict_types=1);

/**
 * Class Titular
 */
class Titular extends Pessoa
{
    /**
     * Titular constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     */
    public function __construct(string $nome, string $cpf, Endereco $endereco)
    {
        parent::__construct($nome, $cpf, $endereco);
    }
}