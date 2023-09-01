<?php

session_start();

include __DIR__ . 'Route.php';
include __DIR__ . 'App.php';
include __DIR__ . '/roteador.php';
include __DIR__ . '/database.php';
include __DIR__ . '/auth.php';

include __DIR__ . '/models/User.php';
include __DIR__ . '/models/Mesa.php';
include __DIR__ . '/models/Sessao.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

App::run();

?>