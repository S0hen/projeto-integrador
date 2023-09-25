<?php

$rota = Route::getRoute('/dashboard/superuser/user/update/email');

    if ((!authorize($rota)) || (!hasUser())) {
        header('location: /');
    }

    if (($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('location: /dashboard/superuser');
    }
    
    if(isset($_POST['novo_email'])) {
        $user_obj = new Usuarios(connection());
        $email = $_POST['email'];
        $new_email = $_POST['novo_email'];
        $user_obj->updateEmail($new_email, $email);
        
        header('Location: /dashboard/superuser/user?message=update');
    }
?>