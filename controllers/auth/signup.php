<?php

if (hasUser()) {
    header('Location: /dashboard');
} else {

    if(isset($_POST['username'], $_POST['email'], $_POST['senha'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['senha'];
    
        $user = new Usuarios(connection());

        $data = $user->find($email);
    
        if ($data) {
            $_SESSION['email'] = $data['usu_email'];
            header('Location: /dashboard');
        } else {
            if ($user->findByName($username)) {
                header('location: /register?message=invalid_user');
            }
            $retorno = $user->save($username, $email, $password, '');
            $_SESSION['email'] = $email;
            header('location: /dashboard');
        }
    
    } else {
        header('location:/signup');
    }
}

?>