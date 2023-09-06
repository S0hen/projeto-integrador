<?php

if (!hasUser()) {
    header('location: /');
} else {
    $user_obj = new User(connection());
    $email = $_SESSION['email'];
    $userid = $user_obj->getID($email);

    /* ERRO NESSA FUNÇÃO */
    $mesas = ParMesa::findAll($userid);
    
    if ($mesas) {
        include('pages/mesas/mesas.php');
    } else {
        echo '<h2>Você não tem mesas registradas no momento!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }


    
}