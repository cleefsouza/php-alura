<?php

declare(strict_types=1);

namespace Alura\PDO\Domain\Model;

use DateTime;

/**
 * Class Aluno
 * @package Alura\PDO
 */
class Aluno
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var string
     */
    private string $nome;

    /**
     * @var DateTime
     */
    private DateTime $nascimento;

    /**
     * Aluno constructor.
     * @param int|null $id
     * @param string $nome
     * @param DateTime $nascimento
     */
    public function __construct(?int $id, string $nome, DateTime $nascimento)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return DateTime
     */
    public function getNascimento(): DateTime
    {
        return $this->nascimento;
    }

    /**
     * @param DateTime $nascimento
     */
    public function setNascimento(DateTime $nascimento): void
    {
        $this->nascimento = $nascimento;
    }

    public function getIdade(): int
    {
        return $this->getNascimento()->diff(new DateTime("NOW"))->y;
    }
}
