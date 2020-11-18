<?php

declare(strict_types=1);

namespace Alura\Model;

/**
 * Class Desenvolvedor
 * @package Alura\Model
 */
class Desenvolvedor extends Funcionario
{
    /**
     * Desenvolvedor constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     * @param string $cargo
     * @param float $salario
     */
    public function __construct(string $nome, string $cpf, Endereco $endereco, string $cargo, float $salario)
    {
        parent::__construct($nome, $cpf, $endereco, $cargo, $salario);
    }

    /**
     * @return float
     */
    public function getSalarioBonificacao(): float
    {
        return $this->salario + ($this->salario * 0.3);
    }
}
