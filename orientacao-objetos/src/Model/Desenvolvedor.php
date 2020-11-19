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
        parent::__construct($nome, $cpf, $endereco, $cargo, $pass, $salario, $nivel);
    }

    /**
     * @return float
     */
    public function getSalarioBonificacao(): float
    {
        return $this->salario + ($this->salario * 0.3);
    }
}
