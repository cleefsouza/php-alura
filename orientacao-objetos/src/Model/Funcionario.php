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
     * @var int
     */
    protected int $nivel;

    /**
     * @var string
     */
    protected string $pass;

    /**
     * Funcionario constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     * @param string $cargo
     * @param string $pass
     * @param float $salario
     * @param int $nivel
     */
    public function __construct(
        string $nome,
        string $cpf,
        Endereco $endereco,
        string $cargo,
        string $pass,
        float $salario,
        int $nivel = 1
    ) {
        parent::__construct($nome, $cpf, $endereco);
        $this->salario = $salario;
        $this->cargo = $cargo;
        $this->nivel = $nivel;
        $this->pass = $pass;
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
     * @return int
     */
    public function getNivel(): int
    {
        return $this->nivel;
    }

    /**
     * @param int $nivel
     */
    public function setNivel(int $nivel): void
    {
        $this->nivel = $nivel;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
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
        return "Cargo: {$this->cargo} Nv. {$this->nivel}, Nome: {$this->nome}, "
            . "Salário: {$this->getSalarioBonificacao()}" . PHP_EOL;
    }
}
