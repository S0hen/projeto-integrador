<?php

    $rota = Route::getRoute('/dashboard/superuser/user/delete');

    if (!hasUser() || (!authorize($rota))) {
        header('Location: /');

    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: /superuser/dashboard');

    } else {
        $email = $_GET['useremail'];
        $model = new Usuarios(connection());

        $model->delete($email);
        
        header('Location: /superuser/index');
    }
?>