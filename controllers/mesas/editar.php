<?php

    $mes_id = $_GET['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $mesa = Mesas::findById($mes_id);
    $email = $_SESSION['email'];
    $userid = (new Usuarios(connection()))->getID($email);
    $mesa = Mesas::findById($mes_id);

    if ($userid == $mesa['mes_usu_idmestre'] ) {
        Mesas::update($_POST['titulo'], $_POST['descricao'], $mes_id);
        include('pages/mesas/editar.php');
    } else {
        echo '<h2>Você não é o mestre dessa mesa!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }
}