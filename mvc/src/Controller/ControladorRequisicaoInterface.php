<?php

namespace Alura\MVC\Controller;

/**
 * Interface ControladorRequisicaoInterface
 * @package Alura\MVC\Controller
 */
interface ControladorRequisicaoInterface
{
    /**
     * @param string $rota
     * @return mixed
     */
    public function processarRequest(string $rota): void;

    /**
     * @param string $template
     * @param array $data
     */
    public function renderizarHtml(string $template, array $data): void;
}
