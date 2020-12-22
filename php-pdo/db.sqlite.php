<?php

$path = __DIR__ . "/db.sqlite";
$pdo = new PDO("sqlite:" . $path);

$tabelas = "
    CREATE TABLE IF NOT EXISTS aluno (
        id INTEGER PRIMARY KEY,
        nome TEXT,
        nascimento TEXT
    );
    
    CREATE TABLE IF NOT EXISTS telefone (
        id INTEGER PRIMARY KEY,
        ddd TEXT,
        numero TEXT,
        aluno_id INTEGER,
        FOREIGN KEY(aluno_id) REFERENCES aluno(id)
    );
";

$pdo->exec($tabelas);
