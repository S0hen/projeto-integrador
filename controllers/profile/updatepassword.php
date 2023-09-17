<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $new_password = $_POST['nova_senha'];
        $password = $user_obj->getPassword($email);

        if (password_verify($_POST['confirma_senha'], $password)) {
            $user_obj->updatePassword($new_password, $email);
            
            echo '<script type="text/javascript">';
            echo ' alert("Senha alterada com sucesso!")';
            echo '</script>';
            header('Location: /dashboard/user');
        } else {
            header("Location: /dashboard/user?error=wrgpswd");
        }
    }
?>