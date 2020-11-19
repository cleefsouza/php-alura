<?php

namespace Alura\Service;

use Alura\Model\Funcionario;

/**
 * Class AutenticadorService
 * @package Alura\Service
 */
class AutenticadorService
{
    /**
     * @param Funcionario $fun
     * @param string $pass
     * @return string
     */
    public function logar(Funcionario $fun, string $pass): string

    {
        return $fun->getPass() === $pass ? "Usuário {$fun->getNome()} logado." . PHP_EOL : "Acesso negado." . PHP_EOL;
    }
}
