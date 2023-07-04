<?php

 // nome do banco de dados

// Criar a conexão  

function connection() : PDO {
    //primeiro especifica qual é a database usada pelo pdo, o tipo tlgd
    //depois o nome do banco de dados, o host o usuário e então a senha
    return new PDO('mysql: dbname=db_teste;host=127.0.0.1', 'root', '');
}

function SQLITEconnection() : SQLite3 {
    return new SQLite3('database.db');
}

$connection = connection();

$SQLITEconnection = SQLITEconnection();

$userdata = $SQLITEconnection->prepare("SELECT * FROM users");

$userdata->execute();

$teste = $userdata->fetchArray();

echo print_r($teste);

die();

$userquery = "INSERT INTO users values {$userdata}";
//$mesadata = "SELECT * FROM mesa";
//$sessaodata = "SELECT * FROM sessao";



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