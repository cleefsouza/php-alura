<?php

namespace Alura\PSR\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class FormInsercaoController
 * @package Alura\PSR\Controller
 */
class FormInsercaoController implements RequestControllerInterface
{
    /**
     * @param ServerRequestInterface $req
     * @return ResponseInterface
     */
    public function processarRequest(ServerRequestInterface $req): ResponseInterface
    {
        return new Response(200, [], "Olá mundo!");
    }
}
