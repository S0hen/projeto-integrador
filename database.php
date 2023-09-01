<?php

function connection() : SQLite3 {
    return new SQLite3('database.db');
}

function find ($query, $connection) {
    $connection = connection();
    return $connection->query($query);
}

function save($query) {
    $db = connection();
    return $db->exec($query);
}

$connection = connection();

//cria as tableas de usuário e dos livros
$connection->exec(
    "CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY,
        name TEXT,
        email TEXT,
        password TEXT,
        type TEXT)" 
);

$connection->exec("CREATE TABLE IF NOT EXISTS mesas(
    id INTEGER PRIMARY KEY,
    title TEXT,
    mestre TEXT,
    players TEXT)"
);

$connection->exec("CREATE TABLE IF NOT EXISTS sessao(
    id INTEGER PRIMARY KEY,
    horario TIME,
    players TEXT,
    data_calendario DATE)"
);