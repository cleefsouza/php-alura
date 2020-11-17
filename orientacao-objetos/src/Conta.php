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
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Conta constructor.
     * @param string $cpf
     * @param string $nome
     * @param int $saldo
     */
    public function __construct(string $cpf, string $nome, int $saldo = 0)
    {
        $this->id = ++Conta::$sequence;
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

    /**
     * @param float $valor
     */
    public function sacar(float $valor): void
    {
        if ($this->saldo < $valor) {
            echo "{$this->nome} - Saldo insuficiente." . PHP_EOL;
            return;
        }

        $this->saldo -= $valor;
    }

    /**
     * @param float $valor
     */
    public function depositar(float $valor): void
    {
        if (0 >= $valor) {
            echo "{$this->nome} - Valor invalido." . PHP_EOL;
            return;
        }

        $this->saldo += $valor;
    }

    /**
     * @param float $valor
     * @param Conta $destino
     */
    public function transferir(float $valor, Conta &$destino): void
    {
        if ($this->saldo < $valor) {
            echo "{$this->nome} - Saldo insuficiente." . PHP_EOL;
            return;
        }

        $this->sacar($valor);
        $destino->depositar($valor);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Id: {$this->id}, Titular: {$this->nome}, CPF: {$this->cpf}, Saldo: {$this->saldo}" . PHP_EOL;
    }
}