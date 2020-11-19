<?php

namespace Alura\Service;

use Alura\Model\Funcionario;

/**
 * Class FuncionarioService
 * @package Alura\Service
 */
class FuncionarioService
{
    /**
     * @param Funcionario $fun
     */
    public function subirNivel(Funcionario $fun): void
    {
        $novoNivel = $fun->getNivel() + 1;
        $fun->setNivel($novoNivel);

        $fun->setSalario($this->subirSalario($fun));
    }

    /**
     * @param Funcionario $fun
     * @return float
     */
    private function subirSalario(Funcionario $fun): float
    {
        return $fun->getSalario() + ($fun->getSalario() * 0.25);
    }
}
