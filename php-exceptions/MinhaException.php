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
    echo "Start \o" . PHP_EOL;
    throw new MinhaException();
} catch (MinhaException $exp) {
    $exp->showExp();
} finally {
    echo "Sempre executo o/" . PHP_EOL;
}

// output:
// Start \o
// Errou!
// Sempre executo o/
