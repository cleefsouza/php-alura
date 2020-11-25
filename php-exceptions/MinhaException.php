<?php

/**
 * Class MinhaException
 */
class MinhaException extends DomainException
{
    public function showExp(): void {
        echo "Errou!" . PHP_EOL;
    }
}

try {
    throw new MinhaException();
} catch (MinhaException $exp) {
    $exp->showExp();
}
