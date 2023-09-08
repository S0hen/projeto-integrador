<?php

$mes_id = $_GET['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $email = $_SESSION['email'];
    $userid = (new User(connection()))->getID($email);
    $mesa = Mesa::findById($mes_id);

    if ($userid == $mesa['mes_usu_idmestre'] ) {
        include('pages/mesas/editar.php');
    } else {
        echo '<h2>Você não é o mestre dessa mesa!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }
}