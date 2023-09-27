<?php   

if (hasUser()) {
    header('Location: /dashboard');
} else {

    if(isset($_POST['email'], $_POST['password'])) {

        $email = $_POST['email'];
        $senha = $_POST['password'];
    
        $data = (new Usuarios(connection()))->find($email);  

        if ($data && password_verify($_POST['password'], $data['usu_senha'])) {
            $_SESSION['email'] = $data['usu_email'];

            if ($data['usu_tipo'] === 'adm') {
                header('location:/dashboard/superuser');
            } else {
                header('Location: /dashboard');
            }
            
        } else {
            header('Location: /register');
        }
    
    } else {
        header('location:/login');
    }
    
}

?>