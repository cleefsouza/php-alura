<?php

namespace Alura\MVC\Controller;

/**
 * Interface ControladorRequisicaoInterface
 * @package Alura\MVC\Controller
 */
interface ControladorRequisicaoInterface
{
    /**
     * Exibir informações
     */
    public function listar(): void;

    /**
     * Formulário de cadastro
     */
    public function form(): void;
}
