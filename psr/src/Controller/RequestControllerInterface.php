<?php

namespace Alura\PSR\Controller;

use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};

/**
 * Interface RequestControllerInterface
 * @package Alura\PSR\Controller
 */
interface RequestControllerInterface
{
    /**
     * @param ServerRequestInterface $req
     * @return ResponseInterface
     */
    public function processarRequest(ServerRequestInterface $req): ResponseInterface;
}
