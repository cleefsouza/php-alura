<?php

namespace Alura\PDO\Domain\Model;

/**
 * Class Telefone
 * @package Alura\PDO\Domain\Model
 */
class Telefone
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var string
     */
    private string $ddd;

    /**
     * @var string
     */
    private string $telefone;

    /**
     * Telefone constructor.
     * @param int $id
     * @param string $ddd
     * @param string $telefone
     */
    public function __construct(int $id,string $ddd,string $telefone)
    {
        $this->id = $id;
        $this->ddd = $ddd;
        $this->telefone = $telefone;
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
    public function getDdd(): string
    {
        return $this->ddd;
    }

    /**
     * @param string $ddd
     */
    public function setDdd(string $ddd): void
    {
        $this->ddd = $ddd;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function formatarTelefone(): string
    {
        return "($this->ddd) $this->telefone";
    }
}
