<?php

for ($i = 0; $i <= 100; $i++) {
    if ($i === 0) continue;

    if ($i % 2 === 0) {
        echo "$i é par." . PHP_EOL;
    } else {
        echo "$i é ímpar." . PHP_EOL;
    }
}