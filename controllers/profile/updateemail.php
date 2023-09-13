<?php
    $changed = false;
    $password_error = false;

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $password = $user_obj->getPassword($email);
        $new_email = $_POST['novo_email'];

        if (password_verify($_POST['confirma_senha'], $password)) {
            $user_obj->updateEmail($new_email, $email);
            $_SESSION['email'] = $new_email;
            $changed = true;
            header('Location: /dashboard/user');
        } else {
            trigger_error("Cannot divide by zero", E_USER_ERROR);
        }

        include __DIR__ . '/../../pages/profile/perfil.php'; 
    }
?>