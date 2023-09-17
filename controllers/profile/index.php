<?php

if (!hasUser()) {
    header('location: /');
} else {
    $user_obj = new User(connection());
    $email = $_SESSION['email'];
    $username = $user_obj->getName($email);

    if ($_GET['error']) {
        $error = $_GET['error'];

        if ($error == 'wrgpswd') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados inalterados devido à senha incorreta.")';
            echo '</script>';
        }
    }

    include('pages/profile/perfil.php');
}
?>