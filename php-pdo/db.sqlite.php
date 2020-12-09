<?php

$path = __DIR__ . "/db.sqlite";
$pdo = new PDO("sqlite:" . $path);

$pdo->exec("CREATE TABLE aluno (id INTEGER PRIMARY KEY, nome TEXT, nascimento TEXT);");
