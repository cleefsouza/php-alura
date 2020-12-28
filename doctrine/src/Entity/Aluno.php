<?php

declare(strict_types=1);

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Aluno
 * @package Alura\Doctrine\Entity
 * @ORM\Entity()
 */
class Aluno
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(name="nome", type="string", nullable=false)
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
