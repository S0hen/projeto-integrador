<?php

if (hasUser()) {
    header('Location: /dashboard');
} else {

    if(isset($_POST['username'], $_POST['senha'])) {

        $username = $_POST['username'];
        //$email = $_POST['email'];
        $password = $_POST['senha'];
    
       $user = new User(connection());
        
       $data = $user->find($username);   
    
       if ($data) {
           header('Location: /dashboard');
       } else {
           $retorno = $user->save($username, $email, $password);
           $_SESSION['user'] = $username;
           header('location: /dashboard');
       }
    
    } else {
        header('location:/signup');
    }


}


