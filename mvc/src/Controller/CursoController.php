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
        $curso = new Curso();
        $curso->setNome($_POST["nome"]);

        $this->entityManager->persist($curso);
        $this->entityManager->flush();
    }
}
