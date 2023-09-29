<?php

    $rota = Route::getRoute('/dashboard/superuser');

    if (!hasUser() || (!authorize($rota)) || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /');
    
    } else {
        $usuarios = (new Usuarios(connection()))->getAll();
        $mesas = Mesas::getAll();

        include('pages/superuser/index.php');
    }
?>