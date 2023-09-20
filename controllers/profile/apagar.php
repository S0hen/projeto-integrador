<?php

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('Location: /'); 
    } else {

        $password = $_POST['senha1'];
        $password2 = $_POST['senha2'];

        $email = $_SESSION['email'];
        $model = new User(connection());
        $userPassword = $model->getPassword($email);

        if ($password == $password2 && password_verify($password, $userPassword)) {

            $model->delete($email);
        
            header('Location: /signout');
        } else {
            header("Location: /dashboard/user?message=wrgpswd");
        }
        
    }
?>