<?php

$mes_id = $_GET['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $email = $_SESSION['email'];
    $userid = (new Usuarios(connection()))->getID($email);
    $participacoes = Participacoes::findByUser($userid);
    $mesa = Mesas::findById($mes_id);

    foreach ($participacoes as $participacao) {
        if ($mes_id = $participacao['par_mes_id']) {
            $sessoes = Sessoes::findByMesId($mes_id);
            include('pages/sessoes/historico.php');
            exit();
        } else {
            echo '<h2>Você não tem acesso à essa mesa!</h2>';
            echo "<a href='/dashboard/user'>Voltar</a>";
        }
    }

    
}