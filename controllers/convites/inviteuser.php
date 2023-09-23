<?php

    if(!hasUser()) {
        header('Location:/');
    } else {
        $message = $_POST['message'];
        $nome = $_POST['nome'];
        $mesa = $_POST['mesa'];

        $usu_id = (new Usuarios(connection()))->getIDByName($nome);
        $convite = new Convites(connection());
        
        $convite->invite($message, $usu_id, $mesa);
        header('Location:/dashboard/user/suasmesas/convite?message=enviado');
    }

?>