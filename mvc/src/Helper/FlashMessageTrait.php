<?php

namespace Alura\MVC\Helper;

/**
 * Trait FlashMessageTrait
 * @package Alura\MVC\Helper
 */
trait FlashMessageTrait
{
    /**
     * @param string $tipo
     * @param string $msg
     */
    public function definirMsg(string $tipo, string $msg): void
    {
        $_SESSION["msg"] = $msg;
        $_SESSION["tipo_msg"] = $tipo;
    }
}
