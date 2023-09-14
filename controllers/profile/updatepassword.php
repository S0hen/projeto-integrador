<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if (!hasUser() || $method==='GET') {
        header('Location: /');
    } else {
        $user_obj = new User(connection());
        $email = $_SESSION['email'];
        $new_password = $_POST['nova_senha'];
        $password = $user_obj->getPassword($email);

        /* "Erro" aqui. Resumindo, a página irá sim incluir 
        o HTML da página de perfil, mas não vai incluir o username,
        já que esta variável não está definida NESTE arquivo e nem
        irá incluir a "imagem" do usuário, visto que o caminho para
        chegar até essa imagem é diferente no caso deste arquivo 
        pelo visto. */

        if (password_verify($_POST['confirma_senha'], $password)) {
            $user_obj->updatePassword($new_password, $email);
            
            echo '<script type="text/javascript">';
            echo ' alert("Senha alterada com sucesso!")';
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