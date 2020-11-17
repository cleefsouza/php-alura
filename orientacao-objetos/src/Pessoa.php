<?php

declare(strict_types=1);

/**
 * Class Pessoa
 */
class Pessoa
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var string
     */
    protected string $nome;

    /**
     * @var string
     */
    protected string $cpf;

    /**
     * @var Endereco
     */
    protected Endereco $endereco;

    /**
     * @var int
     */
    protected static $sequence = 0;

    /**
     * Pessoa constructor.
     * @param string $nome
     * @param string $cpf
     * @param Endereco $endereco
     */
    public function __construct(string $nome, string $cpf, Endereco $endereco)
    {
        $this->id = ++Pessoa::$sequence;
        $this->nome = $nome;
        $this->cpf = $cpf;
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