<?php

    $password_error = false;
    $changed = false;
    $password = $_POST['confirma_senha'];
    $password2 = $_POST['confirma_senha_2'];

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('Location: /');
    } else if ($password !== $password2) {
        $password_error = true;
        header('Location: /perfil');
    } else {
        $email = $_SESSION['email'];
        $model = new User(connection());

        $model->delete($email);
        header('Location: /signout');
    }
?>