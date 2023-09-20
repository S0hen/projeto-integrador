<?php

    $rota = Route::getRoute('/dashboard/superuser/user/delete');

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /');

    } else {

        if (authorize($rota)) {
            
            $email = $_GET['useremail'];
            $model = new User(connection());

            $model->delete($email);
            
            header('Location: /superuser/index');

        }
        
    }
?>