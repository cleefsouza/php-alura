<?php

namespace Alura\PDO\Domain\Repository;

use Alura\PDO\Domain\Model\Aluno;
use DateTime;

/**
 * Interface AlunoRepositoryInterface
 * @package Alura
 */
interface AlunoRepositoryInterface
{
    /**
     * @return array
     */
    public function listar(): array;

    /**
     * @param DateTime $nascimento
     * @return array
     */
    public function alunosPorNascimento(DateTime $nascimento): array;

    /**
     * @param Aluno $aluno
     */
    public function salvar(Aluno $aluno): void;

    /**
     * @param Aluno $aluno
     */
    public function remover(Aluno $aluno): void;
}
