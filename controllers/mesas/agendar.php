<?php

if (!hasUser()) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /dashboard');
}

$rota = Route::getRoute('/dashboard/mesas/agendamento/agendar');

if (isset($_POST['data'], $_POST['horario'])) {
    
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $retorno = Sessao::find($horario, $data);

    if ($retorno) {
        header('location: /dashboard/mesas');
    } else {
        $result = Sessao::save($horario, $data);
        header('location: /dashboard/mesas');
    }
}

?>