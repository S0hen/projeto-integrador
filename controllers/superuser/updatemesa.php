<?php

$rota = Route::getRoute('/dashboard/superuser/mesa/editar');

    $mes_id = $_POST['mesa'];

    if ((!hasUser()) || (!isset($mes_id)) || (!authorize($rota)) || ($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('location: /');
    } else {
        $mesa = Mesas::findById($mes_id);

        Mesas::update($_POST['titulo'], $_POST['descricao'], $mes_id);
        include('pages/superuser/editamesas.php');
    }

?>