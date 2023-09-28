<?php

    if((!hasUser()) || ($_SERVER['REQUEST_METHOD']) == 'GET') {
        header('Location:/');
    } else {
        $message = $_POST['message'];
        $nome = $_POST['nome'];
        $mesa = $_POST['mesa'];

        $mestre_id = Mesas::getMestId($mesa);
        $usu_id = (new Usuarios(connection()))->getIDByName($nome);

        if ($usu_id === $mestre_id) {
            $convite = new Convites(connection());
            
            $convite->invite($message, $usu_id, $mesa);
            header('Location:/dashboard/user/suasmesas/convite?message=enviado');
        } else {
            echo '<h2>Você não é o mestre dessa mesa!</h2>';
            echo "<a href='/dashboard/user'>Voltar</a>";
        }
    }

?>