<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

/**
 * Class LoginController
 * @package Alura\MVC\Controller
 */
class LoginController implements ControladorRequisicaoInterface
{
    private const TITLE_LOGIN = "Login";

    /**
     * Formulário de login
     */
    public function form(): void
    {
        $this->renderizarHtml("login/form.php", ["titulo" => self::TITLE_LOGIN]);
    }

    /**
     * @param string $template
     * @param array $data
     */
    public function renderizarHtml(string $template, array $data): void
    {
        extract($data);
        require __DIR__ . "/../../view/$template";
    }

    public function listar(): void
    {
    }

    public function salvar(): void
    {
    }

    public function remover(): void
    {
    }

    public function alterar(): void
    {
    }
}
