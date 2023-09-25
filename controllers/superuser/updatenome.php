<?php
    
$rota = Route::getRoute('/dashboard/superuser/user/update/nome');

    if ((!authorize($rota)) || (!hasUser())) {
        header('location: /');
    }
    
    if (($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('location: /dashboard/superuser');
    }
    
    if(isset($_POST['novo_nome'])) {
        $user_obj = new Usuarios(connection());
        $email = $_POST['email'];
        $new_name = $_POST['novo_nome'];
        $user_obj->updateName($new_name, $email);
        
        header('Location: /dashboard/superuser/user?message=update');
    }
?>