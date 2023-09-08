<?php
    $changed = false;
    $password_error = false;
    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $new_password = $POST['nova_senha'];
        $password = $user_obj->getPassword($email);

        if ($password === $POST['confirma_senha']) {
            $user_obj->updatePassword($new_password, $email);
            $changed = true;
            header('Location: /perfil');
        } else {
            $password_error = true;
        }

        include __DIR__ . '/../../pages/profile/perfil.php'; 
    }
?>