<?php

declare(strict_types=1);

namespace Alura\Model;

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
     * @var int
     */
    private int $numero;

    /**
     * @var float
     */
    private float $saldo;

    /**
     * @var Titular
     */
    private Titular $titular;

    /**
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Conta constructor.
     * @param Titular $titular
     * @param int $numero
     * @param int $saldo
     */
    public function __construct(Titular $titular, int $numero, int $saldo = 0)
    {
        $this->id = ++Conta::$sequence;
        $this->titular = $titular;
        $this->numero = $numero;
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
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
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
     * @return Titular
     */
    public function getTitular(): Titular
    {
        return $this->titular;
    }

    /**
     * @param Titular $titular
     */
    public function setTitular(Titular $titular): void
    {
        $this->titular = $titular;
    }

    /**
     * @return int
     */
    public static function getSequence(): int
    {
        return self::$sequence;
    }

    /**
     * @param int $sequence
     */
    public static function setSequence(int $sequence): void
    {
        self::$sequence = $sequence;
    }

    /**
     * @param float $valor
     */
    public function sacar(float $valor): void
    {
        if ($this->saldo < $valor) {
            echo "{$this->titular->getNome()} - Saldo insuficiente." . PHP_EOL;
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
            echo "{$this->titular->getNome()} - Valor invalido." . PHP_EOL;
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
            echo "{$this->titular->getNome()} - Saldo insuficiente." . PHP_EOL;
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
        return "Nº: {$this->numero}, Titular: {$this->titular->getNome()}, "
            . "CPF: {$this->titular->getCpf()}, Saldo: {$this->saldo}" . PHP_EOL;
    }
}