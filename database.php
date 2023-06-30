<?php

 // nome do banco de dados

// Criar a conexão  

function connection() : mysqli {
    $host = '127.0.0.1'; // endereço do servidor MySQL
    $usuario = 'root'; // nome de usuário do MySQL
    $senha = ''; // senha do MySQL
    $banco = 'db_teste';

    return new mysqli($host, $usuario, $senha, $banco);
}

/*
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

$connection = connection(); /*/


$connection->query(
    "CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY,
        name TEXT,
        email TEXT,
        password TEXT)" 
);

/*

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
);*/