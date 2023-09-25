<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new Usuarios(connection());
        $email = $_SESSION['email'];
        $password = $user_obj->getPassword($email);
        $new_email = $_POST['novo_email'];

        if (password_verify($_POST['confirma_senha'], $password)) {
            $user_obj->updateEmail($new_email, $email);
            $_SESSION['email'] = $new_email;

            header('Location: /dashboard/user?message=update');
        } else {
            header("Location: /dashboard/user?message=wrgpswd");
        }
    }
?>