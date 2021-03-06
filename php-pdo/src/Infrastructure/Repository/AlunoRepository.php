<?php

declare(strict_types=1);

namespace Alura\PDO\Infrastructure\Repository;

use Alura\PDO\Domain\{Model\Aluno, Repository\AlunoRepositoryInterface};
use Alura\PDO\Infrastructure\Persistence\Connection;
use DateTime;
use PDO;
use PDOException;
use RuntimeException;

/**
 * Class AlunoRepository
 * @package Alura\PDO\Infrastructure\Persistence\Repository
 */
class AlunoRepository implements AlunoRepositoryInterface
{
    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * @var TelefoneRepository
     */
    private TelefoneRepository $telefoneRepository;

    /**
     * AlunoRepository constructor.
     */
    public function __construct()
    {
        $this->pdo = Connection::criarConexao();
        $this->telefoneRepository = new TelefoneRepository();
    }

    /**
     * @return array
     */
    public function listar(): array
    {
        $sql = "SELECT a.*, t.* FROM aluno a LEFT JOIN telefone t ON t.aluno_id = a.id";
        $stm = $this->pdo->query($sql);

        return $stm->fetchAll();
    }

    /**
     * @param DateTime $nascimento
     * @return array
     */
    public function alunosPorNascimento(DateTime $nascimento): array
    {
        $sql = "SELECT a.*, t.* FROM aluno a LEFT JOIN telefone t ON telefone.aluno_id = aluno.id WHERE a.nascimento = ?";

        $stm = $this->pdo->query($sql);
        $stm->bindValue(1, $nascimento->format("Y-m-d"));

        return $stm->fetchAll();
    }

    /**
     * @param Aluno $aluno
     */
    public function salvar(Aluno $aluno): void
    {
        try {
            $this->pdo->beginTransaction();

            if (!empty($aluno->getId())) {
                $this->update($aluno);

                return;
            }

            $this->insert($aluno);

            $this->pdo->commit();
        } catch (RuntimeException|PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }
    }

    /**
     * @param Aluno $aluno
     */
    public function remover(Aluno $aluno): void
    {
        try {
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM aluno WHERE id = ?";

            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, 5, PDO::PARAM_INT);

            $stm->execute();

            $this->pdo->commit();
        } catch (RuntimeException|PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }
    }

    /**
     * @param Aluno $aluno
     */
    private function insert(Aluno $aluno): void
    {
        $sql = "INSERT INTO aluno (nome, nascimento) VALUES (:nome, :nascimento)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue("nome", $aluno->getNome());
        $stm->bindValue("nascimento", $aluno->getNascimento()->format("Y-m-d"));
        $stm->execute();

        $aluno->setId((int)$this->pdo->lastInsertId());
    }

    /**
     * @param Aluno $aluno
     */
    private function update(Aluno $aluno): void
    {
        $sql = "UPDATE aluno SET nome = :nome, nascimento = :nascimento WHERE id = :id";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue("nome", $aluno->getNome());
        $stm->bindValue("nascimento", $aluno->getNascimento()->format("Y-m-d"));
        $stm->bindValue("id", $aluno->getId());

        $stm->execute();
    }
}
