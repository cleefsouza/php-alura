<?php

namespace Alura\PDO\Domain\Repository;

use Alura\PDO\Domain\Model\Telefone;

/**
 * Interface TelefoneRepositoryInterface
 * @package Alura\PDO\Domain\Repository
 */
interface TelefoneRepositoryInterface
{
    /**
     * @return array
     */
    public function listar(): array;

    /**
     * @param int $alunoId
     * @return array
     */
    public function buscarPorAluno(int $alunoId): array;

    /**
     * @param Telefone $telefone
     * @param int $alunoId
     * @return Telefone
     */
    public function salvar(Telefone $telefone, int $alunoId): Telefone;
}
