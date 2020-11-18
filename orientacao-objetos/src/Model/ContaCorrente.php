<?php

declare(strict_types=1);

namespace Alura\Model;

/**
 * Class ContaCorrente
 * @package Alura\Model
 */
class ContaCorrente extends Conta
{
    /**
     * ContaCorrente constructor.
     * @param Titular $titular
     * @param int $numero
     * @param int $saldo
     */
    public function __construct(Titular $titular, int $numero, int $saldo = 0)
    {
        parent::__construct($titular, $numero, $saldo);
    }

    /**
     * @return float
     */
    protected function getTarifa(): float
    {
        return 0.05;
    }
}
