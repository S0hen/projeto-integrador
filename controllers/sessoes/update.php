<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $horario = $_POST['horario'];
        $data = $_POST['data'];
        $mes_id = $_POST['mes_id'];

        Sessoes::update($horario, $data, $mes_id);
        header('Location: /dashboard/user/sessoes?message=updated');
    }
?>