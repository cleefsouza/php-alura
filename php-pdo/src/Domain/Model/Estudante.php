<?php

declare(strict_types=1);

namespace Alura\PDO\Domain\Model;

use DateTime;

/**
 * Class Estudante
 * @package Alura\PDO
 */
class Estudante
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $nome;

    /**
     * @var DateTime
     */
    private DateTime $nascimento;

    /**
     * Estudante constructor.
     * @param int $id
     * @param string $nome
     * @param DateTime $nascimento
     */
    public function __construct(int $id, string $nome, DateTime $nascimento)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
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
}
