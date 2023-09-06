<?php

if (!hasUser()) {
    header('location: /');
} else {
    $email = $_SESSION['email'];
    $userid = (new User(connection()))->getID($email);

    $participamesas = ParMesa::findByUser($userid);

    $mesas = [];
    foreach ($participamesas as $linha) {
        $mesa = Mesa::findById($linha['pam_mes_id']);
        if ($mesa) {
            $mesas[] = [
                'mes_id' => $mesa['mes_id'],
                'mes_titulo' => $mesa['mes_titulo'],
                'mes_descricao' => $mesa['mes_descricao'],
            ];
        }
    }

    if ($mesas) {
        include('pages/mesas/mesas.php');
    } else {
        echo '<h2>Você não tem mesas registradas no momento!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }


    
}