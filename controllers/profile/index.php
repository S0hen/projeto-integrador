<?php

if (!hasUser()) {
    header('location: /');
} else {
    $user_obj = new Usuarios(connection());
    $email = $_SESSION['email'];
    $username = $user_obj->getName($email);

    if ($_GET['message']) {
        $message = $_GET['message'];

        if ($message == 'wrgpswd') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados inalterados devido à senha incorreta.")';
            echo '</script>';
        } elseif ($message == 'deleted') {
            echo '<script type="text/javascript">';
            echo ' alert("Conta deletada com sucesso, redirecionando...")';
            echo '</script>';
            header('Location: /signout');
        } elseif ($message == 'update') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados alterados com sucesso!")';
            echo '</script>';
        }
    }

    include('pages/profile/perfil.php');
}
?>