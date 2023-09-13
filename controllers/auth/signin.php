<?php   

if (hasUser()) {
    header('Location: /dashboard');
} else {

    if(isset($_POST['email'], $_POST['password'])) {

        $email = $_POST['email'];
        $senha = $_POST['password'];
    
        $user = new User(connection());
        
        $data = $user->find($email);   
        
        if ($data && password_verify($_POST['password'], $data['usu_senha'])) {
            $_SESSION['email'] = $data['usu_email'];
            header('Location: /dashboard');
        } else {
            header('Location: /register');
        }
    
    } else {
        header('location:/login');
    }
    
}

?>