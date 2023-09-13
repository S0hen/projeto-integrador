<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $password = $user_obj->getPassword($email);
        $new_name = $_POST['novo_nome'];

        if (password_verify($_POST['confirma_senha'], $password)) {
            $user_obj->updateName($new_name, $email);
            header('Location: /dashboard/user?changed=true');
        } else {
            header('Location: /dashboard/user?changed=false');
        }
    }
?>