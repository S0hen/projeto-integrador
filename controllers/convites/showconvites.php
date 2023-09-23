<?php

if (!hasUser()) {
    header('location: /');
} else {
    $email = $_SESSION['email'];
    $model = new Convites(connection());

    if ($_GET['message']) {
        $message = $_GET['message'];

        if ($message == 'aceito') {
            echo '<script type="text/javascript">';
            echo ' alert("Convite aceito.")';
            echo '</script>';
        } elseif ($message == 'deleted') {
            echo '<script type="text/javascript">';
            echo ' alert("Convite recusado.")';
            echo '</script>';
        }
    }

    $userid = (new Usuarios(connection()))->getID($email);
    $listaconvites = (new Convites(connection()))->findByPlayer($userid);

    $convites = [];
    foreach ($listaconvites as $linha) {
        $convite = $model->findById($linha['con_id']);
        if ($convite) {
            $convites[] = [
                'con_id' => $convite['con_id'],
                'con_datacalendario' => $convite['con_datacalendario'],
                'con_status' => $convite['con_status'],
                'con_show' => $convite['con_show'],
                'con_mensagem' => $convite['con_mensagem'],
                'con_usu_id' => $convite['con_usu_id'],
                'con_mes_id' => $convite['con_mes_id']
            ];
        }
    }

    if ($convites) {
        include('pages/convites/convites.php');
    } else {
        echo '<h2>Você não tem nenhum convite no momento!</h2>';
        echo "<a href='/'>Voltar</a>";
    }
}