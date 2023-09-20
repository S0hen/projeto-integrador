<?php

    if (!hasUser()) {
        header('location: /');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header('location: /dashboard');
    }
    
    if(isset($_POST['novo_email'])) {
        $user_obj = new User(connection());
        $email = $_POST['email'];
        $new_email = $_POST['novo_email'];
        $user_obj->updateEmail($new_email, $email);
        
        header('Location: /dashboard/superuser/user?message=update');
    }
?>