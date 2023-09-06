<?php
    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $password = $user_obj->getPassword($email);
        $new_email = $POST['novo_email'];

        if ($password === $POST['confirma_senha']) {
            $user_obj->updateEmail($new_email, $email);
            $_SESSION['email'] = $new_email;
            $changed = true;
            header('Location: /perfil');
        } else {
            $password_error = true;
        }

        include __DIR__ . '/../../pages/profile/perfil.php'; 
    }
?>