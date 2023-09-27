<?php

    $rota = Route::getRoute('/dashboard/superuser/mesa/delete');

    if (!hasUser() || (!authorize($rota))) {
        header('Location: /');

    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: /superuser/dashboard');

    } else {
        $mes_id = $_GET['mesa'];
        $result = Mesas::delete($mes_id);

        header('Location: /dashboard/superuser');
    }
?>