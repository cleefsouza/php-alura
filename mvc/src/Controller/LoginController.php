<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Usuario;
use Alura\MVC\Infrastructure\EntityManagerFactory;
use Doctrine\ORM\{EntityManagerInterface, ORMException};

/**
 * Class LoginController
 * @package Alura\MVC\Controller
 */
class LoginController implements ControladorRequisicaoInterface
{
    private const TITLE_LOGIN = "Login";
    private const MSG_ERRO = "E-mail ou senha inválidos!";

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * LoginController constructor.
     * @throws ORMException
     */
    public function __construct()
    {
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
    }

    /**
     * @param string $rota
     */
    public function processarRequest(string $rota): void
    {
        switch ($rota) {
            case "/login":
                $this->form();
                break;
            case "/login/validar":
                $this->validar();
                break;
        }
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

    /**
     * Formulário de login
     */
    public function form(): void
    {
        $this->renderizarHtml("login/form.php", ["titulo" => self::TITLE_LOGIN]);
    }

    /**
     * Validando login
     */
    public function validar(): void
    {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

        if (empty($email)) {
            echo self::MSG_ERRO;
            return;
        }

        /** @var Usuario $usuario */
        $usuario = $this
            ->entityManager
            ->getRepository(Usuario::class)
            ->findOneBy(["email" => $email]);

        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        if (is_null($usuario) || !$usuario->isSenhaValida($senha)) {
            echo self::MSG_ERRO;
            return;
        }

        $_SESSION["user"] = true;

        header("Location: /curso/listar", true, 302);
    }
}
