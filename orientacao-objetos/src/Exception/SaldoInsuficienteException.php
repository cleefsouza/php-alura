<?php

declare(strict_types=1);

namespace Alura\Exception;

use DomainException;

/**
 * Class SaldoInsuficienteException
 * @package Alura\Exception
 */
class SaldoInsuficienteException extends DomainException
{
    /**
     * SaldoInsuficienteException constructor.
     * @param string $message
     */
    public function __construct(string $message = "Saldo insuficiente.")
    {
        parent::__construct($message);
    }
}
