<?php

const ZERADO = 0;
const DIVISOR = "------------------------" . PHP_EOL;

// sub-rotinas

/**
 * @param string $acao
 * @param bool $sucesso
 */
function msg(string $acao, bool $sucesso = false): void
{
    echo $sucesso
        ? "Ação ($acao) realizada com sucesso." . PHP_EOL . DIVISOR
        : "Você não pode $acao esse valor." . PHP_EOL . DIVISOR;
}

/**
 * @param array|null $conta
 */
function exibir(?array $conta): void
{
    if (empty($conta)) {
        msg("exibir");
        return;
    }

    echo "CPF: {$conta["cpf"]}" . PHP_EOL;
    echo "Titular: {$conta["titular"]}" . PHP_EOL;
    echo "Saldo: R$ {$conta["saldo"]}" . PHP_EOL;
    echo DIVISOR;
}

// funções

/**
 * @param float $valor
 * @param array $conta
 * @return array
 */
function sacar(float $valor, array $conta): array
{
    if ($conta["saldo"] < $valor) {
        msg("sacar");
        return $conta;
    }

    $conta["saldo"] -= $valor;
    msg("sacar", true);

    return $conta;
}

/**
 * @param float $valor
 * @param array $conta
 * @return array
 */
function depositar(float $valor, array $conta): array
{
    if (ZERADO >= $valor) {
        msg("depositar");
        return $conta;
    }

    $conta["saldo"] += $valor;
    msg("depositar", true);

    return $conta;
}

/**
 * @param array $contas
 * @param string $numero
 */
function remover(array &$contas, string $numero): void
{
    if (key_exists($numero, $contas)) {
        unset($contas[$numero]);
        msg("remover, conta $numero", true);
        return;
    }

    msg("remover");
}