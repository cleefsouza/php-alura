<?php

declare(strict_types=1);

/**
 * Class Titular
 */
class Titular
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $cpf;

    /**
     * @var string
     */
    private string $nome;

    /**
     * @var Endereco
     */
    private Endereco $endereco;

    /**
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Titular constructor.
     * @param string $cpf
     * @param string $nome
     * @param Endereco $endereco
     */
    public function __construct(string $cpf, string $nome, Endereco $endereco)
    {
        $this->id = ++Titular::$sequence;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
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
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
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
     * @return Endereco
     */
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     */
    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }
}