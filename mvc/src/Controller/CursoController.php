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
        $titulo = "Listar cursos";
        $cursos = $this->entityManager->getRepository(Curso::class)->findAll();
        require __DIR__ . "/../../view/curso/listar.php";
    }

    /**
     * Formulário para cadastro dos cursos
     */
    public function form(): void
    {
        $titulo = "Novo curso";
        require __DIR__ . "/../../view/curso/form.php";
    }

    /**
     * Salvar curso
     */
    public function salvar(): void
    {
        $nome = filter_input(
            INPUT_POST,
            "nome",
            FILTER_SANITIZE_STRING
        );

        $curso = new Curso();
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
        $id = filter_input(
            INPUT_GET,
            "id",
            FILTER_VALIDATE_INT
        );

        if (empty($id)) header("Location: /curso/listar", true, 404);

        $curso = $this->entityManager->getReference(Curso::class, $id);

        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        header("Location: /curso/listar", true, 302);
    }
}