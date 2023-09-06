<?php

if (!hasUser()) {
    header('location: /');
} else {
    $user_obj = new User(connection());
    $email = $_SESSION['email'];
    $username = $user_obj->getName($email);

    include('pages/profile/perfil.html');
}
?>