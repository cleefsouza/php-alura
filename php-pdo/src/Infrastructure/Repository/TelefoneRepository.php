<?php

namespace Alura\PDO\Infrastructure\Repository;

use Alura\PDO\Domain\Model\Telefone;
use Alura\PDO\Domain\Repository\TelefoneRepositoryInterface;
use Alura\PDO\Infrastructure\Persistence\Connection;
use PDO;

/**
 * Class TelefoneRepository
 * @package Alura\PDO\Infrastructure\Repository
 */
class TelefoneRepository implements TelefoneRepositoryInterface
{
    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * AlunoRepository constructor.
     */
    public function __construct()
    {
        $this->pdo = Connection::criarConexao();
    }

    /**
     * @return array
     */
    public function listar(): array
    {
        $sql = "SELECT * FROM telefone";
        $stm = $this->pdo->query($sql);

        return $stm->fetchAll();
    }

    /**
     * @param int $alunoId
     * @return array
     */
    public function buscarPorAluno(int $alunoId): array
    {
        $sql = "SELECT * FROM telefone WHERE aluno_id = ?";
        $stm = $this->pdo->query($sql);
        $stm->bindValue(1, $alunoId);

        return $stm->fetchAll();
    }

    /**
     * @param Telefone $telefone
     * @param int $alunoId
     * @return Telefone
     */
    public function salvar(Telefone $telefone, int $alunoId): Telefone
    {
        $sql = "INSERT INTO telefone (ddd, numero, aluno_id) VALUES (:ddd, :numero, :aluno)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue("ddd", $telefone->getDdd());
        $stm->bindValue("numero", $telefone->getNumero());
        $stm->bindValue("aluno", $alunoId);
        $stm->execute();

        $telefone->setId((int)$this->pdo->lastInsertId());

        return $telefone;
    }
}
