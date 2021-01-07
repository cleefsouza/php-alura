<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Curso;
use Alura\MVC\Infrastructure\EntityManagerFactory;
use Doctrine\ORM\ORMException;

/**
 * Class CursoController
 * @package Alura\MVC\Controller
 */
class CursoController implements ControladorRequisicaoInterface
{
    /**
     * @var mixed
     */
    private $cursoRepository;

    /**
     * CursoController constructor.
     * @throws ORMException
     */
    public function __construct()
    {
        $this->cursoRepository = (new EntityManagerFactory())
            ->getEntityManager()
            ->getRepository(Curso::class);
    }

    /**
     * Listar cursos
     */
    public function listar(): void
    {
        $titulo = "Listar cursos";
        $cursos = $this->cursoRepository->findAll();
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
}
