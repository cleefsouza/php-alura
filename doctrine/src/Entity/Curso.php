<?php

declare(strict_types=1);

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\{ArrayCollection, Collection};

/**
 * @Entity
 * Class Curso
 * @package Alura\Doctrine\Entity
 */
class Curso
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
     * @Column(name="nome", type="string", nullable=true)
     */
    private string $nome;

    /**
     * @var Collection|null
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos", fetch="LAZY")
     */
    private ?Collection $alunos;

    /**
     * Curso constructor.
     */
    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

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

    /**
     * @return Collection|null
     */
    public function getAlunos(): ?Collection
    {
        return $this->alunos;
    }

    /**
     * @param Collection|null $alunos
     */
    public function setAlunos(?Collection $alunos): void
    {
        $this->alunos = $alunos;
        $this->alunos->map(fn($alu) => $alu->getCursos()->add($this));
    }
}
