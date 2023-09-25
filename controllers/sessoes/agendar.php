<?php

if (!hasUser()) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /dashboard');
}

$rota = Route::getRoute('/dashboard/sessoes/agendar');

if (isset($_POST['data'], $_POST['horario'])) {
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $mes_id = $_POST['mes_id'];

    $user_info = (new Usuarios(connection()))->find($_SESSION['email']);
    $mesa = Mesas::findById($mes_id);

    if ($mesa['mes_usu_idmestre'] != $user_info['usu_id']) {
        /* é pra ter uma msg de erro aqui */
        header('/dashboard');
    }
    
    $retorno = Sessoes::find($horario, $data, $mes_id);

    if ($retorno) {
        header('location: /dashboard');
    } else {
        $result = Sessoes::save($horario, $data, $mes_id);
        header('location: /dashboard');
    }
}

?>