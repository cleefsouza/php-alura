<?php

declare(strict_types=1);

/**
 * Class Funcionario
 */
class Funcionario
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $nome;

    /**
     * @var string
     */
    private string $cpf;

    /**
     * @var string
     */
    private string $cargo;

    /**
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Funcionario constructor.
     * @param string $nome
     * @param string $cpf
     * @param string $cargo
     */
    public function __construct(string $nome, string $cpf, string $cargo)
    {
        $this->id = ++Funcionario::$sequence;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->cargo = $cargo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
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