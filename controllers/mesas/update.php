<?php

if (!hasUser() || $_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /');
} else {

    if (isset($_POST['titulo'], $_POST['descricao'], $_POST['mes_id'])) {
        $mesa = Mesas::findById($_POST['mes_id']);
        $email = $_SESSION['email'];
        $userid = (new Usuarios(connection()))->getID($email);
        
        if ($userid == $mesa['mes_usu_idmestre'] ) {
            Mesas::update($_POST['titulo'], $_POST['descricao'], $_POST['mes_id']);
            header('location: /dashboard/user/suasmesas');
        } else {
            echo '<h2>Você não é o mestre dessa mesa!</h2>';
            echo "<a href='/dashboard/user/suasmesas'>Voltar</a>";
        }
    } else {
        header('location: /dashboard/user');
    }


    
}


