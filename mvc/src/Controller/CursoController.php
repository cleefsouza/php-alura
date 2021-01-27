<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Curso;
use Alura\MVC\Infrastructure\EntityManagerFactory;
use Doctrine\ORM\{EntityManagerInterface, ORMException};

/**
 * Class CursoController
 * @package Alura\MVC\Controller
 */
class CursoController implements ControladorRequisicaoInterface
{
    public const TITLE_LISTAR = "Listar cursos";
    private const TITLE_ALTERAR = "Alterar curso";
    private const TITLE_NOVO = "Novo curso";

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * CursoController constructor.
     * @throws ORMException
     */
    public function __construct()
    {
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
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
     * @param string $rota
     */
    public function processarRequest(string $rota): void
    {
        switch ($rota) {
            case "/curso/listar":
                $this->listar();
                break;
            case "/curso/adicionar":
                $this->form();
                break;
            case "/curso/salvar":
                $this->salvar();
                break;
            case "/curso/alterar":
                $this->alterar();
                break;
            case "/curso/remover":
                $this->remover();
                break;
        }
    }

    /**
     * Listar cursos
     */
    private function listar(): void
    {
        $cursos = $this->entityManager->getRepository(Curso::class)->findAll();

        $this->renderizarHtml("curso/listar.php", ["titulo" => self::TITLE_LISTAR, "cursos" => $cursos]);
    }

    /**
     * Formulário para cadastro dos cursos
     */
    private function form(): void
    {
        $this->renderizarHtml("curso/form.php", ["titulo" => self::TITLE_NOVO]);
    }

    /**
     * Salvar curso
     */
    private function salvar(): void
    {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $curso = new Curso();

        $_SESSION["msg"] = "Curso salvo com sucesso!";
        $_SESSION["tipo_msg"] = "success";

        if (!empty($id)) {
            $curso = $this->entityManager->getRepository(Curso::class)->find($id);
            $_SESSION["msg"] = "Curso atualizado com sucesso!";
            $_SESSION["tipo_msg"] = "info";
        }


        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $curso->setNome($nome);

        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        header("Location: /curso/listar", true, 302);
    }

    /**
     * Remover curso
     */
    private function remover(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if (empty($id)) {
            header("Location: /curso/listar", true, 404);
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);

        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        $_SESSION["msg"] = "Curso removido com sucesso!";
        $_SESSION["tipo_msg"] = "info";
        header("Location: /curso/listar", true, 302);
    }

    /**
     * Alterar curso
     */
    private function alterar(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $curso = $this->entityManager->getRepository(Curso::class)->find($id);

        if (empty($curso)) {
            header("Location: /curso/listar", true, 404);
            return;
        }

        $this->renderizarHtml("curso/form.php", ["titulo" => self::TITLE_ALTERAR, "curso" => $curso]);
    }
}
