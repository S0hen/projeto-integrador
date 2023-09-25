<?php

    if (!hasUser()) {
        header('location: /');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header('location: /dashboard');
    }
    
    if(isset($_POST['nova_senha'])) {
        $user_obj = new Usuarios(connection());
        $email = $_POST['email'];
        $new_password = $_POST['nova_senha'];
        $user_obj->updatePassword($new_password, $email);
        
        header('Location: /dashboard/superuser/user?message=update');
    }
?>