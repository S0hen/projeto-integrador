<?php

    if((!hasUser()) || ($_SERVER['REQUEST_METHOD']) == 'GET') {
        header('Location:/');
    } else {
        $message = $_POST['message'];
        $nome = $_POST['nome'];
        $mesa = $_POST['mesa'];

        $email = $_SESSION['email'];
        $usu_id = (new Usuarios(connection()))->getID($email);

        $mestre_id = Mesas::getMestId($mesa);

        if ($usu_id === $mestre_id) {
            $convite = new Convites(connection());
            
            $destinatario = (new Usuarios(connection()))->getIDByName($nome);

            $convite->invite($message, $destinatario, $mesa);
            header('Location:/dashboard/user/suasmesas/convite?message=enviado');
        } else {
            echo '<h2>Você não é o mestre dessa mesa!</h2>';
            echo "<a href='/dashboard/user'>Voltar</a>";
        }
    }

?>