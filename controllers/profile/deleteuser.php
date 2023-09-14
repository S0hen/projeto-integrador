<?php

    $password = $_POST['confirma_senha'];
    $password2 = $_POST['confirma_senha_2'];

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('Location: /');
    } else if ($password !== $password2) {

        echo '<script type="text/javascript">';
        echo ' alert("Senha incorreta, sua conta não será deletada.")';
        echo '</script>';
        header('Location: /perfil');
    } else {

        $email = $_SESSION['email'];
        $model = new User(connection());

        $model->delete($email);
        
        echo '<script type="text/javascript">';
        echo ' alert("Conta deletada com sucesso, redirecionando...")';
        echo '</script>';
        header('Location: /signout');
    }
?>