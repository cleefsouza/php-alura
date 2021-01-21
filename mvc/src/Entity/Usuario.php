<?php

declare(strict_types=1);

namespace Alura\MVC\Entity;

/**
 * Class Usuario
 * @package Alura\MVC\Entity
 * @Entity
 */
class Usuario
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
    private string $email;

    /**
     * @var string
     * @Column(type="string", nullable=true)
     */
    private string $senha;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_ARGON2I);
    }
}
