<?php

if (!hasUser()) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /dashboard');
}

$rota = Route::getRoute('/dashboard/mesas/agendamento/agendar');

if (isset($_POST['players'], $_POST['data'], $_POST['horario'])) {
    
    $players = $_POST['players'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $retorno = Sessao::find($players, $horario, $data);

    if ($retorno) {
        header('location: /dashboard/mesas');
    } else {
        $result = Sessao::save($players, $horario, $data);
        header('location: /dashboard/mesas');
    }
}

?>