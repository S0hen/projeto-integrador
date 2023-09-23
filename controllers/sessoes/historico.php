<?php

$mes_id = $_GET['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $email = $_SESSION['email'];
    $userid = (new Usuarios(connection()))->getID($email);
    $mesa = Mesas::findById($mes_id);

    //Por enquanto essa será a única verificação porque
    //o sistema de convites ainda não existe, então não
    //tem como ter nenhum usuário na mesa a não ser o mestre,
    //porém, quando tiver, será usado o ParMesa.

    if ($userid == $mesa['mes_usu_idmestre'] ) {
        $sessoes = Sessoes::findByMesId($mes_id);
        include('pages/sessoes/historico.php');
    } else {
        echo '<h2>Você não é o mestre dessa mesa!</h2>';
        echo "<a href='/dashboard/user'>Voltar</a>";
    }


    
}