<?php

declare(strict_types=1);

/**
 * Class Conta
 */
class Conta
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
     * @var float
     */
    private float $saldo;

    /**
     * Conta constructor.
     * @param int $id
     * @param string $cpf
     * @param string $nome
     * @param int $saldo
     */
    public function __construct(int $id, string $cpf, string $nome, int $saldo = 0)
    {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->saldo = $saldo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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

    /**
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * @param float $saldo
     */
    public function setSaldo(float $saldo): void
    {
        $this->saldo = $saldo;
    }
}