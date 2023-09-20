<?php

    if (!hasUser()) {
        header('location: /');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header('location: /dashboard');
    }
    
    if(isset($_POST['novo_nome'])) {
        $user_obj = new User(connection());
        $email = $_POST['email'];
        $new_name = $_POST['novo_nome'];
        $user_obj->updateName($new_name, $email);
        
        header('Location: /dashboard/superuser/user?message=update');
    }
?>