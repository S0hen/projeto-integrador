<?php

if (hasUser()) {
    header('Location: /dashboard');
} else {

    if(isset($_POST['username'], $_POST['email'], $_POST['senha'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['senha'];
    
       $user = new User(connection());
        
       $data = $user->find($email);   
    
       if ($data) {
           $_SESSION['user'] = $data['name'];
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


