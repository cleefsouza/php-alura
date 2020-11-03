<?php

const ZERADO = 0;

// sub-rotinas

/**
 * @param string $acao
 * @param bool $sucesso
 */
function msg(string $acao, bool $sucesso = false): void
{
    echo $sucesso ? "Ação ($acao) realizada com sucesso." . PHP_EOL : "Você não pode $acao esse valor." . PHP_EOL;
}

/**
 * @param array $conta
 */
function exibir(array $conta): void
{
    echo "------------------------" . PHP_EOL;
    echo "CPF: {$conta["cpf"]}" . PHP_EOL;
    echo "Titular: {$conta["titular"]}" . PHP_EOL;
    echo "Saldo: R$ {$conta["saldo"]}" . PHP_EOL;
    echo "------------------------" . PHP_EOL;
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