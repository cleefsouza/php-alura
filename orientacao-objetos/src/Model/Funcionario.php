<?php

declare(strict_types=1);

namespace Alura\Model;

/**
 * Class Funcionario
 * @package Alura\Model
 */
abstract class Funcionario extends Pessoa
{
    /**
     * @var float
     */
    protected float $salario;

    /**
     * @var string
     */
    protected string $cargo;

    /**
     * Funcionario constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     * @param string $cargo
     * @param float $salario
     */
    public function __construct(string $nome, string $cpf, Endereco $endereco, string $cargo, float $salario)
    {
        parent::__construct($nome, $cpf, $endereco);
        $this->salario = $salario;
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

    /**
     * @return float
     */
    public function getSalario(): float
    {
        return $this->salario;
    }

    /**
     * @param float $salario
     */
    public function setSalario(float $salario): void
    {
        $this->salario = $salario;
    }

    /**
     * @return float
     */
    abstract protected function getSalarioBonificacao(): float;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Cargo: {$this->cargo}, Funcionario: {$this->nome}, Salário: {$this->getSalarioBonificacao()}" . PHP_EOL;
    }
}
