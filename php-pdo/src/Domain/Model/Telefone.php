<?php

declare(strict_types=1);

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
    private string $numero;

    /**
     * Telefone constructor.
     * @param int|null $id
     * @param string $ddd
     * @param string $numero
     */
    public function __construct(?int $id, string $ddd, string $numero)
    {
        $this->id = $id;
        $this->ddd = $ddd;
        $this->numero = $numero;
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
     * @return string
     */
    public function formatarTelefone(): string
    {
        return "($this->ddd) $this->numero";
    }
}
