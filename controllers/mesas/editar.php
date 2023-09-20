<?php

    $mes_id = $_GET['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $mesa = Mesa::findById($mes_id);
    $email = $_SESSION['email'];
    $userid = (new User(connection()))->getID($email);

    if ($userid == $mesa['mes_usu_idmestre'] ) {
        Mesa::update($_POST['titulo'], $_POST['descricao'], $mes_id);
        include('pages/mesas/editar.php:message=sucesso');
    } else {
        echo '<h2>Você não é o mestre dessa mesa!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }
}