<?php

declare(strict_types=1);

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 * Class Aluno
 * @package Alura\Doctrine\Entity
 */
class Aluno
{
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     * @Column(name="nome", type="string", nullable=false)
     */
    private string $nome;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
}
