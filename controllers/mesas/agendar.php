<?php

if (!hasUser()) {
    header('location: /');
}

$method = $_SERVER['REQUEST_METHOD'];


/*if ($method == 'GET') {
    header('location: /dashboard');
}*/

if (isset($_POST['players'], $_POST['data'], $_POST['horario'])) {
    
    $players = $_POST['players'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $retorno = Sessao::findSessao($players, $horario, $data);

    if ($retorno) {
        header('location: /dashboard/mesas');
    } else {
        $result = Sessao::saveSessao($players, $horario, $data);
        header('location: /dashboard/mesas');
    }

}