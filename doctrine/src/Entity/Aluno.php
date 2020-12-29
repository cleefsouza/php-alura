<?php

declare(strict_types=1);

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\{ArrayCollection, Collection};

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
     * @var Collection|null
     * @OneToMany(targetEntity="Telefone", fetch="LAZY", mappedBy="aluno", cascade={"persist", "remove"})
     */
    private ?Collection $telefones;

    /**
     * @var Collection|null
     * @OneToMany(targetEntity="Curso", mappedBy="cursos")
     */
    private ?Collection $cursos;

    /**
     * Aluno constructor.
     */
    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
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
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    /**
     * @param Collection|null $telefones
     */
    public function setTelefones($telefones): void
    {
        $this->telefones = $telefones;
        array_map(fn($tel) => $tel->setAluno($this), $this->telefones->toArray());
    }

    /**
     * @return Collection|null
     */
    public function getCursos(): ?Collection
    {
        return $this->cursos;
    }

    /**
     * @param Collection|null $cursos
     */
    public function setCursos(?Collection $cursos): void
    {
        $this->cursos = $cursos;
        $this->cursos->map(fn($cur) => $cur->getAlunos()->add($this));
    }
}
