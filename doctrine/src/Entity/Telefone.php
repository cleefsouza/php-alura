<?php

declare(strict_types=1);

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 * Class Telefone
 * @package Alura\Doctrine\Entity
 */
class Telefone
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
     * @Column(name="numero", type="string", nullable=true)
     */
    private string $numero;

    /**
     * @var Aluno
     * @ManyToOne(targetEntity="Aluno", fetch="LAZY", inversedBy="telefones")
     */
    private Aluno $aluno;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Telefone
     */
    public function setId(int $id): Telefone
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return Aluno
     */
    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    /**
     * @param Aluno $aluno
     */
    public function setAluno(Aluno $aluno): void
    {
        $this->aluno = $aluno;
    }
}
