<?php

declare(strict_types=1);

/**
 * Class Titular
 */
class Titular
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $cpf;

    /**
     * @var string
     */
    private string $nome;

    /**
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Titular constructor.
     * @param string $cpf
     * @param string $nome
     */
    public function __construct(string $cpf, string $nome)
    {
        $this->id = ++Titular::$sequence;
        $this->cpf = $cpf;
        $this->nome = $nome;
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
}