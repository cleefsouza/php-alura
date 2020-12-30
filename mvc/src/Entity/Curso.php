<?php

declare(strict_types=1);

namespace Alura\MVC\Entity;

/**
 * Class Curso
 * @package Alura\MVC\Entity
 * @Entity
 */
class Curso
{
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", nullable=true)
     */
    private int $id;

    /**
     * @var string
     * @Column(type="string", nullable=true)
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
