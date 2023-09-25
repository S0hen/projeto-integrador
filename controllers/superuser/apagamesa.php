<?php

    $rota = Route::getRoute('/dashboard/superuser/mesa/delete');

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /');

    } else {

        if (authorize($rota)) {
            
            $mes_id = $_GET['mesa'];
            Mesas::delete($mes_id);
            
            header('Location: /superuser/index');
        }
        
    }
?>