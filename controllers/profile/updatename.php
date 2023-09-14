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
            
            echo '<script type="text/javascript">';
            echo ' alert("Nome de usuário alterado com sucesso!")';
            echo '</script>';
            header('Location: /dashboard/user');
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("Dados inalterados devido à senha incorreta.")';
            echo '</script>';
            header('Location: /dashboard/user');
        }
    }
?>