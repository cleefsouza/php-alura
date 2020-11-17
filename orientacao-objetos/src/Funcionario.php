<?php

declare(strict_types=1);

/**
 * Class Funcionario
 */
class Funcionario extends Pessoa
{
    /**
     * @var string
     */
    private string $cargo;

    /**
     * Funcionario constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     * @param string $cargo
     */
    public function __construct(string $nome, string $cpf, Endereco $endereco, string $cargo)
    {
        parent::__construct($nome, $cpf, $endereco);
        $this->cargo = $cargo;
    }

    /**
     * @return string
     */
    public function getCargo(): string
    {
        return $this->cargo;
    }

    /**
     * @param string $cargo
     */
    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }
}