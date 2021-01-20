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
    private const TITLE_LISTAR = "Listar cursos";
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
     * Listar cursos
     */
    public function listar(): void
    {
        $cursos = $this->entityManager->getRepository(Curso::class)->findAll();

        $this->renderizarHtml("curso/listar.php", ["titulo" => self::TITLE_LISTAR, "cursos" => $cursos]);
    }

    /**
     * Formulário para cadastro dos cursos
     */
    public function form(): void
    {
        $this->renderizarHtml("curso/form.php", ["titulo" => self::TITLE_NOVO]);
    }

    /**
     * Salvar curso
     */
    public function salvar(): void
    {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $curso = new Curso();

        if (!empty($id)) {
            $curso = $this->entityManager->getRepository(Curso::class)->find($id);
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
    public function remover(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if (empty($id)) {
            header("Location: /curso/listar", true, 404);
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);

        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        header("Location: /curso/listar", true, 302);
    }

    /**
     * Alterar curso
     */
    public function alterar(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $curso = $this->entityManager->getRepository(Curso::class)->find($id);

        if (empty($curso)) {
            header("Location: /curso/listar", true, 404);
            return;
        }

        $this->renderizarHtml("curso/form.php", ["titulo" => self::TITLE_ALTERAR, "curso" => $curso]);
    }

    /**
     * @param string $template
     * @param array $data
     */
    private function renderizarHtml(string $template, array $data): void
    {
        extract($data);
        require __DIR__ . "/../../view/$template";
    }
}
