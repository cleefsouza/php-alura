<?php

for ($i = 0; $i <= 5; $i++) {
    if ($i === 0) continue; // continue
    echo "for $i" . PHP_EOL;
}

$count = 0;
while ($count <= 5) {
    if ($count === 4) break; // break
    echo "while $count" . PHP_EOL;
    $count++;
}